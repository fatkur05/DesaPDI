<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/index', function () {
    return view('index');
});

Route::get('/login', 'AuthController@getLogin')->name('login')->middleware('guest');
Route::Post('/login', 'AuthController@PostLogin')->name('postlogin');
Route::Post('/register', 'AuthController@PostRegister')->name('register');
Route::get('/admin_page', function() {
	return view('admin_page/index-admin');
})->name('admin_page')->middleware('auth');
Route::get('/logout', 'AuthController@logout')->name('logout')->middleware('auth');;


