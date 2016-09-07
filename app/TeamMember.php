<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    public static $rules = [
            'user_id' => 'required',
            'project_id' => 'required',
         	'role' => 'required'
        ];
}
