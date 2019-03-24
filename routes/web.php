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

Route::get('/teamregist', function () {
    return view('other.teamreg');
});

Route::get('boardinghouses/creates/{id}', 'BoardingHouseController@creates')->name('boardinghouses.creates');
Route::post('boardinghouses/search', 'BoardingHouseController@search')->name('boardinghouses.search');
Route::post('chambers/search', 'ChamberController@search')->name('chambers.search');
Route::get('chambers/creates/{id}', 'ChamberController@creates')->name('chambers.creates');

Route::prefix('address')->group(function(){
	Route::get('/getRegencies/{id}', 'AddressController@getRegencies')->name('address.getRegencies');
	Route::get('/getDistricts/{id}', 'AddressController@getDistricts')->name('address.getDistricts');
	Route::get('/getVillages/{id}', 'AddressController@getVillages')->name('address.getVillages');
});


Route::resource('provinces', 'ProvinceController', [
    'only' => ['index', 'store']
]);
Route::resource('regencies', 'RegencyController', [
    'only' => ['index', 'store']
]);
Route::resource('districts', 'DistrictController', [
    'only' => ['index', 'store']
]);
Route::resource('villages', 'VillageController', [
    'only' => ['index', 'store']
]);
Route::resource('boardinghouses', 'BoardingHouseController');
Route::resource('chambers', 'ChamberController', [
	'except' => ['show']
]);
Route::resource('universities', 'UniversityController',[
	'except' => ['show']
]);
Route::resource('mou', 'MOUController', [
	'except' => ['edit', 'update']
]);
Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@logout')->name('user.logout');

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	Route::get('/showKostariaTeam', 'AdminController@showKostariaTeam')->name('admin.showKostariaTeam');
	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetEmailLink')->name('admin.password.email');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::get('/register/kostariateam', 'Auth\KostariateamRegisterController@showRegistrationForm')->name('kostariateam.register');
	Route::post('/register/kostariateam', 'Auth\KostariateamRegisterController@register')->name('kostariateam.register.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('kostariateam')->group(function(){
	Route::get('/login', 'Auth\KostariateamLoginController@showLoginForm')->name('kostariateam.login');
	Route::post('/login', 'Auth\KostariateamLoginController@login')->name('kostariateam.login.submit');
	Route::get('/logout', 'Auth\KostariateamLoginController@logout')->name('kostariateam.logout');	
	Route::get('/', 'KostariateamController@index')->name('kostariateam.dashboard');
});
