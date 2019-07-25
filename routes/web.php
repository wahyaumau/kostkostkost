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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'BoardingHouseController@showAll')->name('boardinghouses.all');

Route::get('/teamregist', function () {
    return view('other.teamreg');
});

Route::get('/about', function () {
    return view('about');
});

Route::resource('categories', 'CategoryController',[
	'except' => ['show']
]);

Route::prefix('blogs')->group(function(){
	Route::get('/{slug}', 'BlogController@show')->name('blogs.show');
	Route::get('/category/{category}', 'BlogController@blogByCategory')->name('blogs.category');
	Route::get('/tag/{tag}', 'BlogController@blogByTag')->name('blogs.tag');
	Route::get('/', 'BlogController@index')->name('blogs.index');
});

Route::resource('posts', 'PostController');

Route::prefix('comments')->group(function(){
	Route::post('/{post}/store', 'CommentController@store')->name('comments.store');
	Route::delete('/{comment}/delete', 'CommentController@destroy')->name('comments.destroy');
	Route::post('/{post}/{comment}/reply', 'CommentController@reply')->name('comments.reply');
});


Route::prefix('boardinghouses')->group(function(){
	Route::get('/create/{mouId}', 'BoardingHouseController@create')->name('boardinghouses.create');
	Route::get('/search', 'BoardingHouseController@search')->name('boardinghouses.search');
	Route::get('/export', 'BoardingHouseController@export')->name('boardinghouses.export');
	// Route::get('/{university}/{id}', 'BoardingHouseController@show')->name('boardinghouses.show');
	Route::get('/{id}', 'BoardingHouseController@show')->name('boardinghouses.show');
});

Route::prefix('chambers')->group(function(){
	Route::post('/search', 'ChamberController@search')->name('chambers.search');
	Route::get('/creates/{bhId}', 'ChamberController@creates')->name('chambers.creates');
	Route::get('/export', 'ChamberController@export')->name('chambers.export');
});

Route::prefix('universities')->group(function(){
	Route::get('/getUniversities/', 'UniversityController@getUniversities')->name('universities.getUniversities');
	Route::get('/export', 'UniversityController@export')->name('universities.export');
	Route::get('regency/{regencyId}', 'UniversityController@getUniversitiesByRegency')->name('universities.getUniversitiesByRegency');
});


Route::prefix('tags')->group(function(){
	Route::delete('/destroy/{user}/{chamber}', 'TagController@destroy')->name('tags.destroy');
	Route::post('/{chamber}', 'TagController@store')->name('tags.store');
});

Route::prefix('transactions')->group(function(){
	Route::get('/showPaymentProofUploadForm/{chamber}', 'TransactionController@showPaymentProofUploadForm')->name('transactions.showPaymentProofUploadForm');
	Route::post('/paymentProofStore/{chamber}', 'TransactionController@paymentProofStore')->name('transactions.paymentProofStore');
	Route::get('/showTransactionForm/{chamber}', 'TransactionController@showTransactionForm')->name('transactions.showTransactionForm');
	Route::get('/showPaymentMethod/{chamber}', 'TransactionController@showPaymentMethod')->name('transactions.showPaymentMethod');
	Route::post('/{chamber}', 'TransactionController@store')->name('transactions.store');
});

Route::prefix('users')->group(function(){
	Route::get('/showCredentialForm/{edittype}', 'UserController@showCredentialForm')->name('users.showCredentialForm');
Route::post('/verifyCredential/{edittype}', 'UserController@verifyCredential')->name('users.verifyCredential');
Route::get('/edit/{user}', 'UserController@edit')->name('users.edit');
Route::patch('/{user}', 'UserController@update')->name('users.update');
Route::get('/editCredential/{user}', 'UserController@editCredential')->name('users.editCredential');
Route::patch('/updateCredential/{user}', 'UserController@updateCredential')->name('users.updateCredential');
Route::get('/show/{user}', 'UserController@show')->name('users.show');
Route::get('/export', 'UserController@export')->name('users.export');
});

Route::prefix('kostariateams')->group(function(){
	Route::get('/showCredentialForm/{edittype}', 'KostariateamController@showCredentialForm')->name('kostariateams.showCredentialForm');
	Route::post('/verifyCredential/{edittype}', 'KostariateamController@verifyCredential')->name('kostariateams.verifyCredential');
	Route::get('/edit/{kostariateam}', 'KostariateamController@edit')->name('kostariateams.edit');
	Route::patch('/{kostariateam}', 'KostariateamController@update')->name('kostariateams.update');
	Route::get('/editCredential/{kostariateam}', 'KostariateamController@editCredential')->name('kostariateams.editCredential');
	Route::patch('/updateCredential/{kostariateam}', 'KostariateamController@updateCredential')->name('kostariateams.updateCredential');
	Route::get('/show/{kostariateam}', 'KostariateamController@show')->name('kostariateams.show');
	Route::get('/export', 'KostariateamController@export')->name('kostariateams.export');
});

Route::get('provinces/export', 'ProvinceController@export')->name('provinces.export');
Route::get('regencies/getRegencies/', 'RegencyController@getRegencies')->name('regencies.getRegencies');
Route::get('regencies/export', 'RegencyController@export')->name('regencies.export');
Route::get('districts/export', 'DistrictController@export')->name('districts.export');
Route::get('villages/export', 'VillageController@export')->name('villages.export');
Route::get('mous/export', 'MOUController@export')->name('mous.export');
Route::get('owners/export', 'OwnerController@export')->name('owners.export');


Route::prefix('address')->group(function(){
	Route::get('/getRegencies/{provinceId}', 'AddressController@getRegencies')->name('address.getRegencies');
	Route::get('/getDistricts/{regencyId}', 'AddressController@getDistricts')->name('address.getDistricts');
	Route::get('/getVillages/{districtId}', 'AddressController@getVillages')->name('address.getVillages');
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
Route::resource('boardinghouses', 'BoardingHouseController',[
	'except' => ['show', 'create']
]);
Route::resource('chambers', 'ChamberController');
Route::resource('universities', 'UniversityController',[
	'except' => ['show']
]);
Route::resource('mou', 'MOUController', [
	'except' => ['edit', 'update']
]);

Route::resource('users', 'UserController',[
	'except' => ['create', 'store', 'delete']
]);

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
	Route::get('/showTransaction', 'AdminController@showTransaction')->name('admin.showTransaction');
	Route::get('/showConfirmTransactionForm/{user}/{chamber}', 'AdminController@showConfirmTransactionForm')->name('admin.showConfirmTransactionForm');
	Route::post('/confirmTransaction/{user}/{chamber}', 'AdminController@confirmTransaction')->name('admin.confirmTransaction');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('kostariateam')->group(function(){
	Route::get('/login', 'Auth\KostariateamLoginController@showLoginForm')->name('kostariateam.login');
	Route::post('/login', 'Auth\KostariateamLoginController@login')->name('kostariateam.login.submit');
	Route::get('/logout', 'Auth\KostariateamLoginController@logout')->name('kostariateam.logout');
	Route::get('/', 'KostariateamController@index')->name('kostariateam.dashboard');
});
