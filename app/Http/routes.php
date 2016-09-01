<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
<<<<<<< HEAD
*/

Route::get('/', 'HomeController@showWelcome');
Route::get('/login', 'Auth\AuthController@redirectToProvider');
Route::get('/auth', 'Auth\AuthController@handleProviderCallback');
Route::resource('users', 'UsersController');


//temporary routes
Route::get('/', function () {
    return view('welcome');
});
Route::get('/account', function () {
    return view('user');
});
Route::get('/edit-account', function () {
    return view('editaccount');
});
Route::get('/editproject', function () {
    return view('editproject');
});
Route::get('/queue', function () {
    return view('queue');
});
Route::get('/closeproject', function () {
    return view('closeproject');
});
Route::get('/submit', function () {
    return view('clientform');
});
Route::get('/featured', function () {
    return view('featuredproject');
});