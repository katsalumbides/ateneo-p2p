<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', 'UsersController@index');

Route::get('users/{user}', 'UsersController@show');

Route::get('/home', 'HomeController@index');


//Register Routes
Auth::routes();

Route::get('/register/validate', function() { return view('auth.faculty'); });

Route::post('/register/validate', 'Auth\RegisterController@chooseFaculty');

Route::post('/register/validate/{user_type}', 'Auth\RegisterController@validateUser');
