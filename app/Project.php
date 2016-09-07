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
}
