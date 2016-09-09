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
Route::get('trello-login', 'ApiController@viewTrello');
Route::get('create-board', 'ApiController@createTrelloBoard');
Route::post('trello', 'ApiController@trelloLogin');
Route::post('submit', 'ProjectsController@store');
Route::get('admin', 'ProjectsController@showUnapproved');
Route::get('all-projects', 'ProjectsController@index');
Route::get('show-project/{id}', 'ProjectsController@showProject');
Route::get('edit/{id}', 'ProjectsController@edit');
Route::put('approve/{id}', 'ProjectsController@update');
Route::put('enter-queue/{id}', 'UsersController@enterQueue');
Route::get('users', 'UsersController@index');
Route::get('form', function(){return view('public.clientform');});
Route::get('account/{id}', 'UsersController@show');
Route::get('invite', 'ProjectsController@viewInvite');
Route::get('accept', 'UsersController@acceptInvite');
Route::get('reject', 'UsersController@rejectInvite');

// *Caution* public/js/trello.js is direct referencing /accept-project in createOrViewBoard().
Route::post('accept-project', 'UsersController@acceptProject');
