<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    protected $table = 'team_members';
    public static $rules = [
            'user_id' => 'required',
            'project_id' => 'required',
         	'role' => 'required'
        ];
}
