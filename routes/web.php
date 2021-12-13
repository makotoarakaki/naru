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
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::get('/', 'WebController@index');
Route::post('/add_schedule', 'WebController@add_schedule')->name('add_schedule');
Route::get('/contract/{id}', 'WebController@contract')->name('contract');
Route::post('/contract_comp/{id}', 'WebController@contract_comp')->name('contract_comp');

//Route::post('auth/register', 'Auth\RegisterController@store')->name('auth.register');

Route::get('users/mypage', 'UserController@mypage')->name('mypage');
Route::get('users/mypage/edit', 'UserController@edit')->name('mypage.edit');
Route::get('users/mypage/address/edit', 'UserController@edit_address')->name('mypage.edit_address');
Route::put('users/mypage', 'UserController@update')->name('mypage.update');
Route::get('users/mypage/favorite', 'UserController@favorite')->name('mypage.favorite');
Route::get('users/mypage/password/edit', 'UserController@edit_password')->name('mypage.edit_password');
Route::put('users/mypage/password', 'UserController@update_password')->name('mypage.update_password');
Route::delete('users/mypage/delete', 'UserController@destroy')->name('mypage.destroy');

Route::post('products/{product}/reviews', 'ReviewController@store');

Route::get('products/{product}/favorite', 'ProductController@favorite')->name('products.favorite');

Route::get('products', 'ProductController@index')->name('products.index');
Route::get('products/{product}', 'ProductController@show')->name('products.show');

Route::get('payments/{payment}/create', 'PaymentController@create')->middleware('auth:admins');
Route::post('payments', 'PaymentController@store')->middleware('auth:admins');
Route::get('payments/{user_id}', 'PaymentController@show')->name('payments.show')->middleware('auth:admins');
//Route::delete('payments/delete', 'PaymentController@destroy')->name('payments.destroy')->middleware('auth:admins');
Route::resource('payments', 'PaymentController')->middleware('auth:admins');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth:admins');
Route::get('/dashboard/{user_id}', 'DashboardController@show')->name('dashboard.show');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('login', 'Dashboard\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Dashboard\Auth\LoginController@login')->name('dashboard.login');
    Route::resource('major_categories', 'Dashboard\MajorCategoryController')->middleware('auth:admins');
    Route::resource('categories', 'Dashboard\CategoryController')->middleware('auth:admins');
    Route::resource('products', 'Dashboard\ProductController')->middleware('auth:admins');
    Route::resource('users', 'Dashboard\UserController')->middleware('auth:admins');
    Route::resource('contracts', 'Dashboard\ContractController')->middleware('auth:admins');
    Route::get('contracts{contract}/edit', 'Dashboard\ContractController@edit')->name('contract.edit')->middleware('auth:admins');
    Route::resource('notifications', 'Dashboard\NotificationController')->middleware('auth:admins');
});
