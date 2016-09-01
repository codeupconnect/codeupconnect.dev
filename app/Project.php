<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public static $rules = [
            'client_name' => 'required',
            'site_url' => 'required',
            'description' => 'required',
            'email' => 'required|email',
            'point_person' => 'required'
        ];
}
