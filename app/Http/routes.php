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

Route::get('/', 'UserPagesController@index');
Route::get('bid', 'UserPagesController@bid');
Route::post('bid', 'UserPagesController@place_bid');
Route::post('change_project', 'UserPagesController@change_project');

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset routes...
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/payment', 'PaymentController@show_payment');
Route::post('/payment/process', 'PaymentController@payment_process');
Route::post('/payment/gateway', 'PaymentController@gateway');

Route::get('admin', 'AdminController@index');

Route::get('admin/login', 'AdminController@show_login');
Route::post('admin/login', 'AdminController@process_login');
Route::get('admin/logout', 'AdminController@logout');

Route::get('admin/bid/{id}', 'AdminController@bid');
Route::get('admin/projects', 'AdminController@projects');
Route::get('admin/users', 'AdminController@users');
Route::get('admin/users/{id}', 'AdminController@user_details');
Route::get('admin/unit/{id}', 'AdminController@edit_unit');
Route::post('admin/unit', 'AdminController@save_unit');
