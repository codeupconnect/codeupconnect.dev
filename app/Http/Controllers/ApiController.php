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
        dd(session())->all();
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


    public function createTrelloBoard(Request $request)
    {
        $userId = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        $user = User::findorFail($userId);
        $project = Project::findorFail($user->active_project);
        $project->trello_id = $request->get('board_id');
        $project->save();

        $data['project_id'] = $user->active_project;
        $data['board_name'] = $project->organization_name . "-" . $project->id;
        $data['board_id'] = $request->get('board_id');
        return view('alumni.trello-login')->with('data', $data);
    }

    public function addNewTrelloUser(Request $request)
    {
        $user = User::findorFail($request->user_id);
        $project = Project::findorFail($user->active_project);

        $boardId = $project->trello_id;
        $trello_key = "06255aa30ed43a51b57297877330a541";
        
        $ch = curl_init(); 
        $url = "https://api.trello.com/1/boards/" . $boardId . "/members?key=" . $trello_key . "&token=" . $user->trello_id ;
        // set url 
        curl_setopt($ch, CURLOPT_URL, "example.com"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);     

        // make request
    }

    public function testAddUser()
    {
        $ch = curl_init(); 
        $url = "https://api.trello.com/1/boards/57d3054c9342d1fbd259251b/members?key=06255aa30ed43a51b57297877330a541&token=f15d6e9b3fc65d32b0fe8e7e13c48694455c599087d258f0b2cf8232495c8e66";
        // set url 
        curl_setopt($ch, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);     
        print_r($output);
        // make request
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
