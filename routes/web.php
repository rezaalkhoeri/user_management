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

//Routes Login Page
Route::get('/signout', 'UserController@signout')->name('signout');
Route::get('/signin', 'UserController@getLogin')->name('signin');
Route::post('/signin', 'UserController@authlogin')->name('signin');


//Routes Password
Route::get('password/reset', 'Auth\ForgotPasswordController@ShowLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Route index
// Route::resource('dashboard-admin', 'HomeController@index')->name('home.dashboard-admin');
Route::group(['middleware' => 'web'], function () {
    Route::get('/dashboard-admin', 'HomeController@index')->name('home.dashboard-admin');
    Route::get('/dashboard-user', 'HomeController@index')->name('home.dashboard-user');
    Route::get('/dashboard-admin/add-user', 'HomeController@addUserIndex')->name('home.add-user-index');
    Route::get('/dashboard-admin/update-user/{PERNR}', 'HomeController@updateUserIndex')->name('home.update-user-index');
    Route::post('/dashboard-admin/update-user/{PERNR}/{ASSIGNMENT_NUMBER}', 'HomeController@updateUser')->name('home.update-user');
    Route::post('/dashboard-admin/inactive-user/{PERNR}/{ASSIGNMENT_NUMBER}', 'HomeController@deleteUser')->name('home.delete-user');
    Route::post('/dashboard-admin/active-user/{PERNR}/{ASSIGNMENT_NUMBER}', 'HomeController@activeUser')->name('home.active-user');
    Route::post('/dashboard-admin/add-user', 'HomeController@addUser')->name('home.add-user');

});
Route::get('/', function () {
    return view('auth.login');
});
