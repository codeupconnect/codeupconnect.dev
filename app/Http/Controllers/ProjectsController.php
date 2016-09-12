<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Project;
use App\TeamMember;
use App\Http\Requests;
use App\Http\Controllers\Controller;

// Mailgun
require __DIR__ . '/../../../vendor/autoload.php';
use Mailgun\Mailgun;

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
        $project->collateral = (isset($request->collateral) ? 0 : 1);
        $project->facebook = (isset($request->facebook) ? 0 : 1);
        $project->linkedin = (isset($request->linkedin) ? 0 : 1);
        $project->twitter = (isset($request->twitter) ? 0 : 1);
        $project->youtube = (isset($request->youtube) ? 0 : 1);
        $project->instagram = (isset($request->instagram) ? 0 : 1);
        $project->tumblr = (isset($request->tumblr) ? 0 : 1);
        $project->blog = (isset($request->blog) ? 0 : 1);
        $project->comments = (isset($request->comments) ? 0 : 1);
        $project->member_signup = (isset($request->member_signup) ? 0 : 1);
        $project->contact_form = (isset($request->contact_form) ? 0 : 1);
        $project->existing_database = (isset($request->existing_database) ? 0 : 1);
        $project->stripe = (isset($request->stripe) ? 0 : 1);
        $project->save();
        $request->session()->flash('message', 'Thank you! Your project is being reviewed by our team of devs! We will follow up soon.');
        

        // Instantiate the client.
        $mgClient = new Mailgun('key-d4c9cd89b2a9f10666d87de18d44652f');

        // Errors before dump/die
        // Due to unrecognized model 'mailgun'
        dd($mgClient);
        
        $domain = "sandboxc3c56cf00e7b4ca78c11792a06851869.mailgun.org";

        # Make the call to the client.
        $result = $mgClient->sendMessage("$domain", array(
                'from'    => 'Mailgun Sandbox <postmaster@sandboxc3c56cf00e7b4ca78c11792a06851869.mailgun.org>',
                'to'      => 'Eddie <beijingtexan@gmail.com>',
                'subject' => 'Hello Eddie',
                'text'    => 'Congratulations Eddie, you just sent an email with Mailgun!  You are truly awesome!  You can see a record of this email in your logs: https://mailgun.com/cp/log .  You can send up to 300 emails/day from this sandbox server.  Next, you should add your own domain so you can send 10,000 emails/month for free.'));

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
        //
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
        $project = Project::findOrFail($id);
        $project->organization_name = $request->organization_name;
        $project->site_url = $request->site_url;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->point_person = $request->point_person;
        $project->phone = $request->phone;
        $project->email = $request->email;
        $project->project_details = $request->project_details; 
        $project->status = 'approved';
        $project->next_invite = '0';
        $project->save();

        $request->session()->flash('message', 'You have updated and approved the project.');

        $project->sendInvite();

        return redirect()->action("ProjectsController@showUnapproved");
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
        $project = Project::findOrFail($id);
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
        $projects = Project::where('status', 'approved');
        $projects = $projects->orderBy('projects.created_at', 'ASC')->paginate(10);
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
        $project = Project::findorFail($id);
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
        {
            return view("admin.editproject")->with('data', $data['attributes'])->with('boolean', $boolean['attributes']);
        } else
        {    
            return view("alumni.project")->with('data', $data['attributes'])->with('boolean', $boolean['attributes'])->with('project', $project);
        }
    }

    public function viewInvite()
    {
        $id = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        $user = User::findOrFail($id);
        $project = Project::findOrFail($user->invite);
        return view('alumni.user-project-invite')->with('user', $user)->with('project', $project);
    }

    public function acceptProject(Request $request)
    {
        // Gather Project and Team Member info
        $userId = session()->get('login_' . md5("Illuminate\Auth\Guard"));
        $user = User::where('id', $userId)->first();
        $role = $request->role;
        $projectId = $request->project_id;
        $boardId = $request->input('board');
        
        // Add to team member table & trello board
        TeamMember::insert([
            'user_id' => $userId,
            'role' => $role,
            'project_id' => $projectId
            ]);
        $teamMembers = TeamMember::where('project_id', $projectId)->count();

        if ($teamMembers >= 2)
        {
            // create trello board
        } else
        {
            // add user to trello board
        }
        Project::insert([
            'trello_id' => $boardId,
            ]);
        User::where('id', $userId)->update(['queue' => null]);

        return view("alumni.trello")->with('boardId', $boardId);
    }

}