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
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/isorg', function () {
    return view('isorg');
})->middleware('guest');

Route::get('/onboarding/location', function () {
    return view('location');
})->middleware('auth');

Route::get('/onboarding/profile', function () {
    return view('profilepic');
})->middleware('auth');

Route::post('/isorg', function ($request) {


    return redirect('register');
});

Route::get('/profile', 'ProfileController@index')->middleware('auth');
Route::get('/profile/{profile}', 'ProfileController@show')->middleware('auth');

Route::get('/profile/{profile}/associates', 'AssociateController@index')->middleware('auth');
Route::post('/profile/{profile}/associates', 'AssociateController@create')->middleware('auth')
;
Route::get('/profile/{profile}/followers', 'FollowerController@index')->middleware('auth');
Route::post('/profile/{profile}/followers', 'FollowerController@create')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
