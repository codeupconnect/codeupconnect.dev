<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('showCompleted');
    }

    // viewable only to users, not outside clients
    public function index()
    {
        $projects = DB::table('projects')->where('status', 'approved')->get();
        $projects = $projects->orderBy('projects.created_at', 'DESC')->paginate(10);
        return view("projects.index")->with("projects", $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // form page for clients to submit
    public function create()
    {
        return view("projects.create");
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
        $project->client_name = $request->client_name;
        $project->site_url = $request->site_url;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->email = $request->email;
        $project->status = $request->status;
        $project->preferred_tech = $request->preferred_tech;
        $project->phone = $request->phone;
        $project->point_person = $request->point_person;
        $project->save();
        $request->session()->flash('message', 'Thank you! Your project is being reviewed by our team of devs! We will follow up soon.');
        return redirect()->action("HomeController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // One Project that is Viewable by Public
    public function show($id)
    {
        $project = Project::find($id);
        if ($project->status == 'complete') {
            return view("project.show")->with('project', $project);
        } else {
            Log::info("Project $id cannot be found");
            abort(404);
        }
    }



    public function showUnapproved()
    {
        $project = Project::find();
        if ($project->status == 'unapproved') {
            return view("project.show")->with('project', $project);
        } else {
            abort(404);
    }

     public function showApproved()
    {
         $project = Project::find();
        if ($project->status == 'complete') {
            return view("project.show")->with('project', $project);
        } else {
            abort(404);
    }

     public function showCompleted()
    {
        $projects = DB::table('projects')
        $project = Project::find()->where('status', 'complete')->get();
        if(!$project) {
            abort(404);
        }
        return view("projects.show")->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // view for admin
    public function edit($id)
    {
        $project = Project::findorFail($id);
        if(!$project) {
            Log::info("Post with ID $id cannot be found");
            abort(404);
        }
        return view("projects.edit")->with('project', $project);
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
        $project->client_name = $request->client_name;
        $project->site_url = $request->site_url;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->email = $request->email;
        $project->preferred_tech = $request->preferred_tech;
        $project->phone = $request->phone;
        $project->point_person = $request->point_person;
        // $project->status = $request->status;
        // if($project->status === approved){
        // $project->save();
        // }
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

}
