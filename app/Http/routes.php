<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::resource('users', 'UsersController');

Route::get('/', 'HomeController@showWelcome');
Route::get('auth/login', 'Auth\AuthController@redirectToProvider');
Route::get('/login', 'Auth\AuthController@redirectToProvider');
Route::get('/logout', 'Auth\AuthController@logout');
Route::get('auth', 'Auth\AuthController@handleProviderCallback');
Route::get('trello', 'ApiController@viewTrello');
Route::get('create-board', 'ApiController@createTrelloBoard');
Route::get('accept', 'ProjectsController@acceptProject');


//temporary routes
Route::get('/', function () {
    return view('public.welcome');
});
Route::get('/account', function () {
    return view('alumni.user');
});
Route::get('/edit-account', function () {
    return view('alumni.editaccount');
});
Route::get('/editproject', function () {
    return view('admin.editproject');
});
Route::get('/queue', function () {
    return view('alumni.queue');
});
Route::get('/closeproject', function () {
    return view('admin.closeproject');
});
Route::get('/submit', function () {
    return view('public.clientform');
});
Route::get('/featured', function () {
    return view('public.featuredproject');
});