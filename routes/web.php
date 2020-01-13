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
Route::get('/signout', 'AuthController@signout')->name('signout');
Route::get('/signin', 'AuthController@getLogin')->name('signin');
Route::post('/signin', 'AuthController@authlogin')->name('signin');

//Routes Password
Route::get('password/reset', 'Auth\ForgotPasswordController@ShowLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Route index
// Route::resource('dashboard-admin', 'UserController@index')->name('home.dashboard-admin');
Route::group(['middleware' => ['userLogin']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('home.dashboard');
    Route::get('/users', 'UserController@index')->name('users.data');
    Route::get('/users/add-user-index', 'UserController@addUserIndex')->name('users.add-user-index');
    Route::get('/users/edit-user/{PERNR}', 'UserController@editUser')->name('users.edit-user');

    Route::post('/users/add-user', 'UserController@addUser')->name('users.add-user');
    Route::post('/users/update-user/{PERNR}/{ASSIGNMENT_NUMBER}', 'UserController@updateUser')->name('users.update-user');
    Route::post('/users/deactivate-user/{PERNR}/{ASSIGNMENT_NUMBER}', 'UserController@deleteUser')->name('users.delete-user');
    Route::post('/users/activate-user/{PERNR}/{ASSIGNMENT_NUMBER}', 'UserController@activeUser')->name('users.active-user');

    Route::get('/list-apps', 'AppsController@listapps')->name('apps.list-apps');
    Route::get('/apps-index', 'AppsController@index')->name('apps.apps-index');
    Route::get('/apps-add-index', 'AppsController@addIndex')->name('apps.apps-add-index');
    Route::get('/apps-edit-index/{ID}', 'AppsController@editIndex')->name('apps.apps-edit-index');

    Route::post('/apps/add-apps', 'AppsController@addApps')->name('apps.add-apps');
    Route::post('/apps/update-apps/{ID}', 'AppsController@updateApps')->name('apps.update-apps');
    Route::post('/apps/delete-apps/{ID}', 'AppsController@deleteApps')->name('apps.delete-apps');    

    Route::get('/apps-mapping-index', 'AppsController@indexAppsMapping')->name('apps.apps-mapping-index');
    Route::get('/apps-mapping-add', 'AppsController@addMappingIndex')->name('apps.apps-mapping-add');
    Route::get('/apps-mapping-edit/{ID}', 'AppsController@editMappingIndex')->name('apps.apps-mapping-edit');

    Route::post('/apps/add-mapping-apps', 'AppsController@addMappingApps')->name('apps.mapping-add');
    Route::post('/apps/edit-mapping-apps/{ID}', 'AppsController@updateMappingApps')->name('apps.mapping-edit');
    Route::post('/apps/delete-mapping-apps/{ID}', 'AppsController@deleteMappingApps')->name('apps.mapping-delete');

});

Route::get('/', function () {
    return view('auth.login');
});
