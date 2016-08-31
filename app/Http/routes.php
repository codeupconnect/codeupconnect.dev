<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
<<<<<<< HEAD
*/

Route::get('/', 'HomeController@showWelcome');
Route::get('/login', 'Auth\AuthController@showLogin');
Route::get('/auth', 'Auth\AuthController@showAuth');