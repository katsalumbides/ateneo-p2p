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

//Practice routes
// Route::get('users', 'UsersController@index');
// Route::get('users/{user}', 'UsersController@show');

//Home and Contact Us
Route::get('/home', 'HomeController@index');
Route::get('/contactus', 'ContactsController@index');

//Profile
Route::get('/profile', 'ReservationsController@show');
Route::get('/profile/{reservation}', 'ReservationsController@delete');

//Register Routes
Auth::routes();
Route::get('/register/faculty', function() { return view('auth.faculty'); });
Route::get('/register/validate', 'Auth\RegisterController@chooseFaculty');
Route::post('/register/{user_type}', 'Auth\RegisterController@validateUser');
