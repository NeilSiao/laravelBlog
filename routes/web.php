<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


/* Route for users */
Route::Group(['prefix' => 'user'], function() {
    Route::get('profile','UserController@userProfile')->name('userProfile');
});


/* i can use middleware('verified') this is exclusive for email verified. */