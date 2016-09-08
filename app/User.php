<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $fillable = ['name', 'email', 'nickname', 'url', 'github_id', 'avatar'];

    protected $hidden = ['password', 'remember_token'];

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
