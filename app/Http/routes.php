<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

//Resources
Route::resource('users', 'UsersController');

Route::get('/', 'HomeController@index');
Route::get('auth/login', 'Auth\AuthController@redirectToProvider');
Route::get('login', 'Auth\AuthController@redirectToProvider');
Route::get('logout', 'Auth\AuthController@logout');
Route::get('auth', 'Auth\AuthController@handleProviderCallback');
Route::get('trello', 'ApiController@viewTrello');
Route::get('create-board', 'ApiController@createTrelloBoard');
Route::get('trello-login', 'ApiController@trelloLogin');
Route::post('submit', 'ProjectsController@store');
Route::get('admin', 'ProjectsController@showUnapproved');
Route::get('show-project/{id}', 'ProjectsController@showProject');
Route::get('edit/{id}', 'ProjectsController@edit');
Route::post('approve', 'ProjectsController@update');
Route::get('enter/{id}', 'UsersController@enterQueue');
Route::get('queue', 'UsersController@showQueue');
Route::get('users', 'UsersController@index');
Route::get('form', function(){return view('public.clientform');});
Route::get('account/{id}', 'UsersController@show');
Route::get('invite', 'ProjectsController@viewInvite');
Route::get('accept', 'UsersController@acceptInvite');
Route::get('reject', 'UsersController@rejectInvite');


// Temp
Route::get('accept', 'ProjectsController@acceptProject');
Route::post('update/{id}', 'ProjectsController@update');


Route::get('editproject', function(){return view('admin.editproject');});

Route::get('project-invite', function(){return view('alumni.user-project-invite');});