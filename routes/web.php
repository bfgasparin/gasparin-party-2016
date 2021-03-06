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

Route::get('/', 'WelcomeController@index');

Route::get('invite/{token}', 'InviteController@accept');
Route::post('upload/avatar', 'API\PhotoController@upload');
Route::get('register/complete', 'Auth\RegisterController@showRegisterComplete');
Auth::routes();
Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebookProvider');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleFacebookProviderCallback');
Route::get('auth/google', 'Auth\LoginController@redirectToGoogleProvider');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleProviderCallback');

Route::get('email/confirmation/{token}', 'Auth\RegisterController@confirmEmail');


Route::get('/home', 'HomeController@index');


Route::get('/guests', 'GuestController@index')->middleware(['auth']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('photos', 'PhotoController@index');
    Route::get('messages', 'MessageController@index');
    Route::get('/painel', 'PainelController@index');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/painel/star', 'PainelController@showStar');

});


