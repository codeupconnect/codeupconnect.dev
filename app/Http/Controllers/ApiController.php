<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Project;
use App\TeamMember;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public static function viewTrello()
    {
        return view('alumni.trello');
    }

    public static function trelloLogin(Request $request)
    {
        $userId = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        $user = User::findorFail($userId);
        $user->trello_id = $request->get('trello_id');
        $user->save();

        $project = Project::findorFail($user->active_project);
        $data['project_id'] = $user->active_project;
        $data['first_member'] = false;
        $data['board_name'] = $project->organization_name . "-" . $project->id;

        // Count Team Members for this Project
        $count = TeamMember::where('project_id', $project->id)->count();
        if ($count == 0)
        {
            $data['first_member'] = true;
        }

        return $data;
    }

    public function acceptProject(Request $request)
    {
        // Gather Project and Team Member info
        $userId = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        $user = User::where('id', $userId)->first();
        $role = $request->role;
        $projectId = $request->project_id;
        $boardId = $request->input('board');
        
        // Add to team member table
        TeamMember::insert([
            'user_id' => $userId,
            'role' => $role,
            'project_id' => $projectId
            ]);
        Project::insert([
            'trello_id' => $boardId,
            ]);
        User::where('id', $userId)->update(['queue' => null]);

        return view("alumni.trello")->with('boardId', $boardId);
    }

    public static function createTrelloBoard()
    {
        return view('alumni.trello');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
