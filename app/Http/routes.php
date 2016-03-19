<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// http://twitter.app/bla
Route::get('/', 'TestController@welcome');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/register', 'AuthController@showRegistration')->name('register.form');
    Route::post('/register', 'AuthController@doRegistration')->name('register.post');
    Route::get('/login', 'AuthController@showLogin')->name('login.form');
    Route::post('/login', 'AuthController@doLogin')->name('login.post');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/profile', 'UserController@showProfile')->name('user.profile');
        Route::get('/logout', 'AuthController@logout')->name('logout');
    });
});
