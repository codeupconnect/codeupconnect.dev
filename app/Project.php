<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{

    public static $rules = [
            'organization_name' => 'required',
            'point_person' => 'required',
            'email' => 'required|email',
            'project_details' => 'required',
        ];

    protected $fillable=['status', 'organization_name', 'point_person', 'email', 'project_details'];

    public function nextinQueue($count = 0)
    {
        $users = User::whereNotNull('queue')->where('active_project', '')->where('invite', '')->orderBy('queue', 'asc')->get();
        $all_users = $users->all();
        if (empty($all_users)) {
            dd("There are no alumni currently available to invite! Recruit some devs, or try again later.");
        }
        $user = $all_users[$count];
        return $user;
    }

    // Send invite for project to next user in queue
    public function sendInvite()
    {
        $nextInvite = $this->next_invite;
        $user = $this->nextinQueue($nextInvite);
        $user->invite = $this->id;
        $user->save();
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
