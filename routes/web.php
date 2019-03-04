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
//App::setLocale('tw-zh');

Route::get('lang/{lang}', 'LanguageController@switchLang')
    ->name('lang.switch');

Route::get('/', function($locale = null)
{
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

    Route::Group(['prefix' => 'user'], function() {
        Route::get('profile','UserController@userProfile')->name('userProfile');
});

Route::group(['prefix'=>'blogPost'], function(){
    Route::resource('Post','PostController');
});

/* Route for users */



/* i can use middleware('verified') this is exclusive for email verified. */