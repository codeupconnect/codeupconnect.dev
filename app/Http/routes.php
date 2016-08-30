<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
<<<<<<< HEAD
*/

// Route::get('/', 'HomeController@showWelcome');
Route::get('/', function () {
    return view('welcome');

Route::get('/login', function() {
	return view('login');
})

Route::get('/auth', function() {
	return view('auth')
})