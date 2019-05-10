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
    return view('landingpage');
});

Route::get('/isorg', function () {
    return view('isorg');
});

Route::post('/isorg', function ($request) {


    return redirect('register');
});

Route::resource('/profile', 'ProfileController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
