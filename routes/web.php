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

Route::get('boardinghouses-autocomplete', 'BoardingHouseController@search');
Route::get('chambers-autocomplete', 'ChamberController@search');
Route::get('university-autocomplete', 'UniversityController@search');
Route::resource('boardinghouses', 'BoardingHouseController');
Route::resource('chambers', 'ChamberController');
Route::resource('universities', 'UniversityController');
Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');
