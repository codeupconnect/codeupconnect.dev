<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\User;
use App\Project;
use App\TeamMember;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UsersController extends Controller
{

    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $myUser = DB::table('users')->where('id', $id)->first();
        
        if($myUser->active_project !== "")

        {
            $userCurrentProject = Project::find($myUser->active_project);
        
            $currentProjectName = $userCurrentProject->organization_name;
        
            $myUser->organization_name = $currentProjectName;
            $myUser->project_id = $userCurrentProject->id;
        }

        $users = User::where('queue', '<>', "")->orderBy('queue', 'asc')->get();
        
        return view('alumni.user', ['myUser' => $myUser, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        return view('alumni.editaccount')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::where('github_id', $githubUser->id)->update(
            [
                'name' => $request->name,
                'resume_url' => $request->resumeUrl,
                'proficiencies' => $request->email,
            ]
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function enterQueue($id)
    {
        $user = User::findOrFail($id);
        $queued = $user->queue;
        $active = $user->active_project;
        if (!$queued && !$active)
        {
            $user->queue = time();
            $user->save();
        }
        return redirect()->action('UsersController@show', $id);
    }

    public function exitQueue($id)
    {
        $user = User::findOrFail($id);
        $user->queue = "";
        $user->save();
        return redirect()->action('UsersController@show', $id);
    }

    public function acceptProject(Request $request)
    {
        // Gather Project and Team Member info
        $userId = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        $user = User::where('id', $userId)->first();
        
        // Future addition for selecting team member's roles
        // $role = $request->role;
        $projectId = $request->project_id;
        $boardId = $request->board_id;
        // Add to team member table
        TeamMember::insert([
            'user_id' => $userId,
            // 'role' => $role,
            'project_id' => $projectId
            ]);
        Project::where('id', $projectId)->update(['trello_id' => $boardId]);

        return view("alumni.trello")->with('boardId', $boardId);
    }   

    public function closeProject(Request $request)
    {
        // Gather Project and Team Member info
        $userId = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        
        $user = User::where('id', $userId)->first();

        $project = Project::findOrFail($user->active_project);
        $project->status = 'closed';
        $project->save();

        $user->queue = time();
        $user->active_project = "";
        $user->save();

        return redirect()->action('UsersController@show', $userId);
    }

    public function acceptInvite(Request $request)
    {
        $user = User::findOrFail($request->id);
        dd($user);
        $project = Project::findOrFail($user->invite);
        $project->next_invite = null;
        $project->save();

        TeamMember::insert([
            'user_id' => $user->id,
            // 'role' => $role,
            'project_id' => $project->id
            ]);

        $user->invite = null;
        $user->active_project = $project->id;
        $user->queue = "";
        $user->save();

        session()->forget('invite');
        return redirect()->action('UsersController@show', $user->id);

    }

    public function rejectInvite(Request $request)
    {
        $user = User::findorFail($request->id);
        $project = Project::findOrFail($user->invite);
        $count = User::all()->count();
        if ($project->next_invite < $count)
        {
            $project->next_invite += 1;
            $project->save();   
        }
        $project->sendInvite();
        $user->invite = null;
        $user->save();
        session()->forget('invite');
        return redirect()->action('UsersController@show', $user->id);
    }
}
