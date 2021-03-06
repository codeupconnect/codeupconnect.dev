<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() 
    {
        return view('public.welcome');
    }

    public function cannotPass()
    {
    	return view('alumni.pass-project');
    }
}