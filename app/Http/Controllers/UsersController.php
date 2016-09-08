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
        $users = User::whereNotNull('queue')->orderBy('queue', 'desc')->get();
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
        $user = User::where('id', $id)->update(
            [
            'queue' => time(),
            ]);
        return redirect()->action('UsersController@show');
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
        User::where('id', $userId)->update(['queue' => null]);

        return view("alumni.trello")->with('boardId', $boardId);
    }

    public function acceptInvite($id)
    {
        $user = User::findOrFail($id);
        $project = Project::findOrFail($user->invite);

        $project->next_invite = null;

        $user->invite = null;
        $user->active_project = $project->id;
    }

    public function rejectInvite($id)
    {
        $user = User::findorFail($id);
        $project = Project::findOrFail($user->invite);

        $project->next_invite += 1;
        $project->save();

        $user->invite = null;
        $user->save();
        $project->sendInvite();
    }
}
