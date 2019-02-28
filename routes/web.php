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

// Route::get('/about', function () {
//     return view('other.about');
// });

// Route::get('/register', function () {
//     return view('other.testReg');
// });

// Route::get('boardinghouses-autocomplete', 'BoardingHouseController@search');
// Route::get('chambers-autocomplete', 'ChamberController@search');
// Route::get('university-autocomplete', 'UniversityController@search');
Route::get('boardinghouses/creates/{id}', 'BoardingHouseController@creates')->name('boardinghouses.creates');

Route::get('chambers/creates/{id}', 'ChamberController@creates')->name('chambers.creates');



Route::resource('boardinghouses', 'BoardingHouseController');
Route::resource('chambers', 'ChamberController');
Route::resource('universities', 'UniversityController');
Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');
Route::resource('mou', 'MOUController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@logout')->name('user.logout');

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');	

	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetEmailLink')->name('admin.password.email');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::get('/register/kostariateam', 'Auth\KostariateamRegisterController@showRegistrationForm')->name('kostariateam.register');
	Route::post('/register/kostariateam', 'Auth\KostariateamRegisterController@register')->name('kostariateam.register.submit');
});

Route::prefix('kostariateam')->group(function(){
	Route::get('/login', 'Auth\KostariateamLoginController@showLoginForm')->name('kostariateam.login');
	Route::post('/login', 'Auth\KostariateamLoginController@login')->name('kostariateam.login.submit');	
	Route::get('/logout', 'Auth\KostariateamLoginController@logout')->name('kostariateam.logout');
	Route::get('/', 'KostariateamController@index')->name('kostariateam.dashboard');	
	// Route::post('/password/email', 'Auth\KostariateamForgotPasswordController@sendResetEmailLink')->name('kostariateam.password.email');
	// Route::post('/password/reset', 'Auth\KostariateamResetPasswordController@reset')->name('kostariateam.password.update');
	// Route::get('/password/reset', 'Auth\KostariateamForgotPasswordController@showLinkRequestForm')->name('kostariateam.password.request');
	// Route::get('/password/reset/{token}', 'Auth\KostariateamResetPasswordController@showResetForm')->name('kostariateam.password.reset');
	Route::get('/', 'KostariateamController@index')->name('kostariateam.dashboard');	
});

