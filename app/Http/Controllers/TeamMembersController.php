<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // team lead plus invite and join from other queue members 
        // designate as FE, BE, Full Support
        // 
        $teamMembers = DB::table('users')->get();
        return view('teamMembers.index', ['teamMembers' => $teamMembers]);
        
        $titles = DB::table('roles')->lists('title');

        foreach ($titles as $title) {
            echo $title;
        }

        foreach ($projects as $project) {
            if (TeamMembers::user_id ===){

            }
        }
        return view("teamproject.index")->with("teamproject", $teamproject);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Team::create([
            "name" => "Internal team"
        ]);

        Auth::user()->attachTeam( $team );

        Teamwork::inviteToTeam( $email, $team, function( $invite )
        {
            // Send email to user / let them know that they got invited
        });

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
