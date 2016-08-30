<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

// Route::get('/', 'HomeController@showWelcome');
Route::get('/', function () {
    return view('welcome');
});
