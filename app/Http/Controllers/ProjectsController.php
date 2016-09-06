<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('showCompleted');
        $this->middleware('auth');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // form page for clients to submit
    public function create()
    {
        return view("public.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    // Store function being initiated by outside client from create page.
    public function store(Request $request)
    {
        $this->validate($request, Project::$rules);
        $project = new Project();
        $project->status = $request->status;
        $project->trello_id = $request->trello_id;
        $project->client_name = $request->organization_name;
        $project->site_url = $request->site_url;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->point_person = $request->point_person;
        $project->phone = $request->phone;
        $project->email = $request->email;
        $project->project_details = $request->project_details;
        $project->logo_graphics = $request->logo_graphics;
        $project->color_palette = $request->color_palette;
        $project->facebook = $request->facebook;
        $project->linkedin = $request->linkedin;
        $project->twitter = $request->twitter;
        $project->youtube = $request->youtube;
        $project->instagram = $request->instagram;
        $project->tumblr = $request->tumblr;
        $project->blog = $request->blog;
        $project->comments_feedback = $request->comments_feedback;
        $project->member_signup = $request->member_signup;
        $project->contact_form = $request->contact_form;
        $project->existing_database = $request->existing_database;
        $project->payment_donationc = $request->payment_donationc;
        $project->save();
        $request->session()->flash('message', 'Thank you! Your project is being reviewed by our team of devs! We will follow up soon.');
        return redirect()->action("HomeController@index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // view for admin
    // admin can edit, reject or approve
    public function edit($id)
    {
        $project = Project::findorFail($id);
        if(!$project) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        return view("admin.editproject")->with('project', $project);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Updates handled by admin, not outside clients
    public function update(Request $request, $id)
    {
        $project = Project::findorFail($id);
        if(!$project) {
            Log::info("Project with ID $id cannot be found");
            abort(404);
        }
        $this->validate($request, Project::$rules);
      $project->status = $request->status;
        $project->trello_id = $request->trello_id;
        $project->client_name = $request->organization_name;
        $project->site_url = $request->site_url;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->point_person = $request->point_person;
        $project->phone = $request->phone;
        $project->email = $request->email;
        $project->project_details = $request->project_details;
        $project->logo_graphics = $request->logo_graphics;
        $project->color_palette = $request->color_palette;
        $project->facebook = $request->facebook;
        $project->linkedin = $request->linkedin;
        $project->twitter = $request->twitter;
        $project->youtube = $request->youtube;
        $project->instagram = $request->instagram;
        $project->tumblr = $request->tumblr;
        $project->blog = $request->blog;
        $project->comments_feedback = $request->comments_feedback;
        $project->member_signup = $request->member_signup;
        $project->contact_form = $request->contact_form;
        $project->existing_database = $request->existing_database;
        $project->payment_donationc = $request->payment_donationc;
        
        $request->session()->flash('message', 'You have updated and approved the project.');
        Log::info($request->all());
        return redirect()->action("ProjectsController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // only admin can destroy
    public function destroy($id)
    {
        $project = Project::findorFail($id);
        if(!$project) {
            Log::info("Project with ID $id cannot be found");
            abort(404);
        }
        session()->flash('message', 'The project was deleted!');
        $project->delete();
        return redirect()->action("ProjectsController@index");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Main projects view for alumni.
    // Once project is approved, it is viewable by all alumni. 
    // At this point projects are either unassigned or assigned - pending team member
    public function index()
    {
        $projects = Project::where('status', 'approved')->get();
        $projects = $projects->orderBy('projects.created_at', 'DESC')->paginate(10);
        return view("alumni.index")->with("projects", $projects);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Show all completed projects to public.
     public function showComplete()
    {
        $projects = Project::where('status' ,'complete')->get();
        return view("public.show")->with('projects', $projects);
    }
    
    // One Project that is viewed when clicked
    public function showProject($id)
    {
        $project = Project::find($id);
        return view("project.show")->with('project', $project);
    }

    public function acceptProject(Request $request)
    {
        // put user id from session into team_members table
        $name = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        $role = session()->get('role');
        $project = session()->get('project_id');
        TeamMember::insert([
            'user_id' => $name,
            'role' => $role,
            'project_id' => $project
            ]);

        // put board id from request into projects table
        $boardId = $request->input('board');
        Project::insert([
            'board_id' => $boardId,
            ]);
        // return user to trello view

    }

}
