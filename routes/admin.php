<?php


//Admin Login
Route::get('login', 'AdminAuth\LoginController@showLoginForm');
Route::post('login', 'AdminAuth\LoginController@login');
Route::get('logout', 'AdminAuth\LoginController@logout');



//Admin Passwords
Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

Route::group(['middleware' => 'admin' ,''], function () {

	Route::get('/home', function () {
	   return view('admin.home');
	})->name('home');
});

