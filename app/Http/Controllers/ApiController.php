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
    public function viewTrello()
    {
        return view('alumni.trello');
    }

    public function trelloLogin(Request $request)
    {
        $userId = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        $trelloId = $request->get('trello_id');
        $boardId = $request->get('board_id');
        $user = User::findorFail($userId);
        $user->trello_id = $trelloId;
        $user->save();

        $project = Project::findorFail($user->active_project);
        $project->trello_id = $trelloId;
        $project->save();

        $data['project_id'] = $user->active_project;
        $data['first_member'] = false;
        $data['board_name'] = $project->organization_name . "-" . $project->id;
        $data['board_id'] = $boardId;
        // Count Team Members for this Project
        $count = TeamMember::where('project_id', $project->id)->where('user_id', $userId)->first();
        if ($count === null)
        {
            $data['first_member'] = true;
        }

        return $data;
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
