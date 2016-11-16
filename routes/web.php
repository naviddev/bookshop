<?php

//superadmin functions
Route::group(['middleware' => ['admin', 'super-admin']], function () {
    Route::get('admin/admins', 'AdminController@showAdmins');

    //Admin Register
    Route::get('admin/admins/add', 'AdminAuth\RegisterController@showRegistrationForm');
    Route::post('admin/admins/add', 'AdminController@registerAdmins');
    //Admin Removing
    Route::get('admin/admins/remove/{id}', 'AdminController@RemoveAdmins');


});
//Admins functions
Route::group(['middleware' => 'admin'], function () {

//    add new item
    Route::get('admin/item/add', 'AdminController@showAddItem');
    Route::post('admin/item/add', 'AdminController@AddItem');

// book item type

    Route::get('admin/item/book', 'AdminController@ShowBooksList');
//    adding books
    Route::get('admin/item/book/add', 'AdminController@ShowAddBooks');
    Route::post('admin/item/book/add', 'AdminController@AddBooks');
//    editing books
    Route::get('admin/item/book/edit/{id}', 'AdminController@ShowEditBooks');
    Route::post('admin/item/book/edit/{id}', 'AdminController@EditBooks');

});

//site function
Route::group(['middleware' => ['web']], function () {
    Route::get('', 'Controller@index');

    Route::get('user/shopping/add/{book_id}', 'Controller@addToShopCard');
//shoping

    Route::get('book/{book_id}', 'Controller@bookShow');
    Route::get('card/item/', 'Controller@cardShow');



});







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

Route::get('register/verify/{token}', 'UserAuth\RegisterController@verify');
Route::get('user/active', 'UserAuth\LoginController@activeShow');
Route::post('register/verify/resend', 'UserAuth\RegisterController@ResendCode');




