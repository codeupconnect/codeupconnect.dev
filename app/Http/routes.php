<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
<<<<<<< HEAD
*/

Route::get('/', 'HomeController@showWelcome');
Route::get('/login', 'Auth\AuthController@redirectToProvider');
Route::get('/auth', 'Auth\AuthController@showAuth');