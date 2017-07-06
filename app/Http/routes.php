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

Route::get('/', function () {
    return view('welcome');
});

/* ================== Homepage + Admin Routes ================== */
require __DIR__.'/admin_routes.php';
require __DIR__.'/sp_routes.php';

/* ============================================================= */
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [
        'as' => 'user.login', 'uses' => 'Auth\SPAuthController@loginPage' ]);
    Route::post('login', [
        'as' => 'user.login.post', 'uses' => 'Auth\SPAuthController@loginPost' ]);
    Route::get('signup', [
        'as' => 'user.signup', 'uses' => 'Auth\SPAuthController@signUpPage' ]);
    Route::post('signup', [
        'as' => 'user.signup.post', 'uses' => 'Auth\SPAuthController@signUpPost' ]);
});

// OAuth Routes
Route::get('auth/{provider}', 'Auth\SPAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SPAuthController@handleProviderCallback');
