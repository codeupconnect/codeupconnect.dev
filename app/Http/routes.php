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
Route::get('accept-project', 'UsersController@acceptProject');

Route::get('trello', 'ApiController@viewTrelloLogin');
Route::post('trello-login', 'ApiController@trelloLogin');
Route::get('new-trello-board', 'ApiController@viewNewBoard');

Route::post('load-board', 'ApiController@createTrelloBoard');
Route::post('submit', 'ProjectsController@store');
Route::get('admin', 'ProjectsController@showUnapproved');
Route::get('all-projects', 'ProjectsController@index');
Route::get('show-project/{id}', 'ProjectsController@showProject');
Route::get('edit/{id}', 'ProjectsController@edit');
Route::get('approve/{id}', 'ProjectsController@update');
Route::put('enter-queue/{id}', 'UsersController@enterQueue');
Route::get('users', 'UsersController@index');
Route::get('form', function(){return view('public.clientform');});
Route::get('account/{id}', 'UsersController@show');
Route::get('invite', 'ProjectsController@viewInvite');
Route::post('accept', 'UsersController@acceptInvite');
Route::post('reject', 'UsersController@rejectInvite');

// *Caution* public/js/trello.js is direct referencing /accept-project in createOrViewBoard().
Route::post('accept-project', 'UsersController@acceptProject');
