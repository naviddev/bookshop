<?php


//User Login
Route::get('login', 'UserAuth\LoginController@showLoginForm');
Route::post('login', 'UserAuth\LoginController@login');
Route::get('logout', 'UserAuth\LoginController@logout');

//User Register
Route::get('register', 'UserAuth\RegisterController@showRegistrationForm');
Route::post('register', 'UserAuth\RegisterController@register');

//User Passwords
Route::post('password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'UserAuth\ResetPasswordController@reset');
Route::get('password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');

Route::group(['middleware' => 'user'], function () {

	Route::get('/home', function () {
	   return view('user.home');
	})->name('home');
});

