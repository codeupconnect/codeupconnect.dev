	<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/


// -----------------
// ---Home & Auth---
// -----------------
	Route::get('/', 'HomeController@index');
	Route::get('auth/login', 'Auth\AuthController@redirectToProvider');
	Route::get('login', 'Auth\AuthController@redirectToProvider');
	Route::get('logout', 'Auth\AuthController@logout');
	Route::get('auth', 'Auth\AuthController@handleProviderCallback');


// ------------
// ---Trello---
// ------------
	Route::get('trello', 'ApiController@viewTrelloLogin');
	Route::post('load-board', 'ApiController@createTrelloBoard');
	Route::get('new-trello-board', 'ApiController@viewNewBoard');
	// The following URLs are directly targeted. Do not change URL.
		Route::post('trello-login', 'ApiController@trelloLogin');
		Route::post('add-trello-user', 'ApiController@addNewTrelloUser');
		Route::post('accept-project', 'UsersController@acceptProject');


// -----------------
// ---User Routes---
// -----------------
	Route::get('alumni/1100', function(){return view('alumni.login');});
	Route::resource('users', 'UsersController');
	Route::get('admin', 'ProjectsController@showUnapproved');
	Route::put('enter-queue/{id}', 'UsersController@enterQueue');
	Route::put('exit-queue/{id}', 'UsersController@exitQueue');
	Route::get('account/{id}', 'UsersController@show');
	Route::get('view-invite', 'ProjectsController@viewInvite');
	Route::get('add-user', 'ApiController@testAddUser');
	

// --------------
// ---Projects---
// --------------
	Route::get('form', function(){return view('public.clientform');});
	Route::post('submit', 'ProjectsController@store');
	Route::put('approve/{id}', 'ProjectsController@update');
	Route::get('all-projects', 'ProjectsController@index');
	Route::get('show-project/{id}', 'ProjectsController@showProject');
	Route::get('accept-project', 'UsersController@acceptProject');
	Route::get('close-project/{id}', 'UsersController@closeProject');
	Route::post('accept', 'UsersController@acceptInvite');
	Route::post('reject', 'UsersController@rejectInvite');
