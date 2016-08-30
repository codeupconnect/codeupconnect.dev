<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
<<<<<<< HEAD
*/

Route::get('/', 'HomeController@showWelcome');

// Authentication:
=======
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
>>>>>>> aebf721db10f39fd2afb61f64ec6237e95a4bd6f
