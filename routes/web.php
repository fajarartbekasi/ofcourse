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

// Auth::routes();

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'signup'], function(){

    Route::get('create', 'SignupController@create')->name('signup.create');
    Route::post('store', 'SignupController@store')->name('signup.store');

});

Route::middleware('auth')->group(function(){

    // Redirect to route home

    Route::get('/home', 'HomeController@index')->name('home');

    
});
