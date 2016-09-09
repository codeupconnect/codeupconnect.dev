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
    public function viewTrelloLogin()
    {
        return view('alumni.trello-login');
    }
    public function viewNewBoard()
    {
        return view('alumni.trello')->with('data', session('data'));
    }

    public function trelloLogin(Request $request)
    {
        $userId = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        $trelloId = $request->get('trello_id');
        
        $user = User::findorFail($userId);
        $user->trello_id = $trelloId;
        $user->save();

        $project = Project::findorFail($user->active_project);

        $data['board_name'] = $project->organization_name . "-" . $project->id;
        $data['project_id'] = $project->id;
        $data['board_id'] = $project->trello_id;

        return $data;
    }


    public static function createTrelloBoard(Request $request)
    {
        $userId = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        $user = User::findorFail($userId);
        $project = Project::findorFail($user->active_project);
        $project->trello_id = $request->get('board_id');
        $project->save();

        $data['project_id'] = $user->active_project;
        $data['board_name'] = $project->organization_name . "-" . $project->id;
        $data['board_id'] = $request->get('board_id');
        return redirect('new-trello-board')->with('data', $data);
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
