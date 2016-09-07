<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\TeamMember;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('showCompleted');
        // $this->middleware('auth');
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
        $project->organization_name = $request->organization_name;
        $project->site_url = $request->site_url;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->point_person = $request->point_person;
        $project->phone = $request->phone;
        $project->email = $request->email;
        $project->project_details = $request->project_details;
        (isset($request->collateral) ? true : false);
        (isset($request->facebook) ? true : false);
        (isset($request->linkedin) ? true : false);
        (isset($request->twitter) ? true : false);
        (isset($request->youtube) ? true : false);
        (isset($request->instagram) ? true : false);
        (isset($request->tumblr) ? true : false);
        (isset($request->blog) ? true : false);
        (isset($request->comments_feedback) ? true : false);
        (isset($request->member_signup) ? true : false);
        (isset($request->contact_form) ? true : false);
        (isset($request->existing_database) ? true : false);
        (isset($request->stripe) ? true : false);
        $project->save();
        $request->session()->flash('message', 'Thank you! Your project is being reviewed by our team of devs! We will follow up soon.');
        return redirect()->action("HomeController@showWelcome");
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
        $project->organization_name = $request->organization_name;
        $project->site_url = $request->site_url;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->point_person = $request->point_person;
        $project->phone = $request->phone;
        $project->email = $request->email;
        $project->project_details = $request->project_details;
        $project->status = 'approved';
        $project->save();
        $request->session()->flash('message', 'You have updated and approved the project.');
        Log::info($request->all());
        return redirect()->action("HomeController@showWelcome");
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
        return view("alumni.approvedprojects")->with("projects", $projects);
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

    public function showUnapproved()
    {
        $projects = Project::where('status' ,'unapproved')->get();
        return view("admin.adminportal")->with('projects', $projects);
    }
    
    // One Project that is viewed when clicked
    public function showProject($id)
    {
        $project = Project::find($id);
        $data = new Project();
        $data->organization_name = $project->organization_name;
        $data->site_url = $project->site_url;
        $data->start_date = $project->start_date;
        $data->end_date = $project->end_date;
        $data->point_person = $project->point_person;
        $data->phone = $project->phone;
        $data->email = $project->email;
        $data->project_details = $project->project_details;

        $boolean = new Project();
        $boolean->id = $project->id;
        $boolean->collateral = $project->collateral;
        $boolean->facebook = $project->facebook;
        $boolean->linkedin = $project->linkedin;
        $boolean->twitter = $project->twitter;
        $boolean->youtube = $project->youtube;
        $boolean->instagram = $project->instagram;
        $boolean->tumblr = $project->tumblr;
        $boolean->blog = $project->blog;
        $boolean->comments = $project->comments;
        $boolean->member_signup = $project->member_signup;
        $boolean->contact_form = $project->contact_form;
        $boolean->existing_database = $project->existing_database;
        $boolean->stripe = $project->stripe;

        if ($project->status == 'unapproved')
            return view("admin.editproject")->with('data', $data['attributes'])->with('boolean', $boolean['attributes']);
        else
            return view("alumni.project")->with('data', $data['attributes'])->with('boolean', $boolean['attributes']);
    }

    public function viewInvite()
    {
        //
    }

    public function acceptProject(Request $request)
    {
        // Gather Project and Team Member info
        $userId = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        $user = User::where('id', $userId)->first();
        $role = $request->role;
        $project = $request->project_id;
        $boardId = $request->input('board');
        
        // Insert Info into Tables
        TeamMember::insert([
            'user_id' => $userId,
            'role' => $role,
            'project_id' => $project
            ]);

        Project::insert([
            'trello_id' => $boardId,
            ]);

        return view("alumni.trello")->with('boardId', $boardId);
    }

}