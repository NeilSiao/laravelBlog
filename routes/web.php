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

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::Group(['prefix' => 'user'], function() {
        Route::get('profile','UserController@userProfile')->name('userProfile');
        Route::post('profile','UserController@userUpdate')->name('userUpdate');
        
});

Route::group(['prefix'=>'blogPost'], function(){
    Route::resource('Post','PostController');
}); 

Route::post('/comment/{post_id}','CommentController@store');


/* Route for users */
/* Route::get('/ecomic/stock', 'PostController@index');
Route::get('/ecomic/stock/edit/{id}', 'PostController@edit');
Route::post('/where/post', 'PostController@ProcessPost'); */
//update where id = client_id
//http:localhost.com/test
//http:yahoo.com/ecomice/stock


/* i can use middleware('verified') this is exclusive for email verified. */