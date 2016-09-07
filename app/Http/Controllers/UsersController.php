<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\User;
use App\Project;
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
        return view('welcome');
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
        $user = DB::table('users')->where('id', $id)->first();
        return view('alumni.user', ['user' => $user]);

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
    }

    public function showQueue()
    {
        $users = User::whereNotNull('queue')->orderBy('queue', 'desc')->get();
        return view('alumni.queue')->with('users', $users);
    }

    public function nextinQueue($count = 0)
    {
        $users = User::whereNotNull('queue')->orderBy('queue', 'desc')->get();
        $all_users = $users->all();
        $user = $all_users[$count];
        return $user;
    }

    // Send invite for project to next user in queue
    public function sendInvite($id)
    {
        $project = Project::findOrFail($id);
        $nextInvite = $project->next_invite;
        $user = nextinQueue($nextInvite);
        // Update user to have invite
        User::where('id', $user->id)->update(
            [
                'invite' => $id,
            ]
        );
    }

    public function acceptInvite($id)
    {
        $user = User::where('id', $id)->get();
        $project = Project::where('id', $user->invite)->get();

        Project::where('id', $project->id)->update(
            [
                'next_invite' = null,
            ]);

        User::where('id', $id)->update(
            [
                'invite' = null,
                'active_project' => $project->id,
            ])    
    }

    public function rejectInvite($id)
    {

        $user = User::findorFail($id);
        $project = Project::findOrFail($user->invite);

        $project->next_invite += 1;
        $project->save();

        $user->invite = null;
        $user->save();

    }
}
