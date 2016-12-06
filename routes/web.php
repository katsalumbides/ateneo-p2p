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

//Reservation
Route::get('/reserve', 'ReservationsController@view');
Route::get('/reserve/trip_type/{trip_type}', 'ReservationsController@selectTripType');
Route::get('/reserve/location/{location}', 'ReservationsController@selectLocation');
Route::post('/reserve', 'ReservationsController@makeReservation');

//Register Routes
Auth::routes();
Route::get('/register/faculty', function() { return view('auth.faculty'); });
Route::get('/register/validate', 'Auth\RegisterController@chooseFaculty');
Route::post('/register/{user_type}', 'Auth\RegisterController@validateUser');

//Admin Routes
Route::get('/admin/home', 'HomeController@index') -> middleware('admin');
Route::get('/admin/home/announcement', 'AnnouncementsController@add') -> middleware('admin');
Route::get('/admin/home/{announcement}', 'AnnouncementsController@delete') -> middleware('admin');

Route::get('/admin/reservations', 'HomeController@index') -> middleware('admin');
Route::get('/admin/schedules', 'ScheduleController@view') -> middleware('admin');
Route::post('/admin/schedules', 'ScheduleController@add') -> middleware('admin');
Route::get('/admin/editcontacts', 'HomeController@index') -> middleware('admin');