<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::model('user', 'User');
Route::model('role', 'Role');
Route::model('recruit', 'Recruit');
Route::model('info', 'Info');
Route::model('introduction', 'Introduction');
Route::model('business', 'Business');

Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('recruit', '[0-9]+');
Route::pattern('info', '[0-9]+');
Route::pattern('introduction', '[0-9]+');
Route::pattern('business', '[0-9]+');

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{

    # Businesses Management
    Route::get('businesses/{business}/edit', 'AdminBusinessesController@getEdit');
    Route::post('businesses/{business}/edit', 'AdminBusinessesController@postEdit');
//    Route::get('businesses/{business}/delete', 'AdminBusinessesController@getDelete');
//    Route::post('businesses/{business}/delete', 'AdminBusinessesController@postDelete');
    Route::controller('businesses', 'AdminBusinessesController');

    # Introductions Management
    Route::get('introductions/{introduction}/edit', 'AdminIntroductionsController@getEdit');
    Route::post('introductions/{introduction}/edit', 'AdminIntroductionsController@postEdit');
//    Route::get('introductions/{introduction}/delete', 'AdminIntroductionsController@getDelete');
//    Route::post('introductions/{introduction}/delete', 'AdminIntroductionsController@postDelete');
    Route::controller('introductions', 'AdminIntroductionsController');

    # Infos Management
    Route::get('infos/{info}/edit', 'AdminInfosController@getEdit');
    Route::post('infos/{info}/edit', 'AdminInfosController@postEdit');
    Route::get('infos/{info}/delete', 'AdminInfosController@getDelete');
    Route::post('infos/{info}/delete', 'AdminInfosController@postDelete');
    Route::controller('infos', 'AdminInfosController');

    # Recruit Management
    Route::get('recruits/{recruit}/show', 'AdminRecruitsController@getShow');
    Route::get('recruits/{recruit}/edit', 'AdminRecruitsController@getEdit');
    Route::post('recruits/{recruit}/edit', 'AdminRecruitsController@postEdit');
    Route::get('recruits/{recruit}/delete', 'AdminRecruitsController@getDelete');
    Route::post('recruits/{recruit}/delete', 'AdminRecruitsController@postDelete');
    Route::controller('recruits', 'AdminRecruitsController');

    # User Management
    Route::get('users/{user}/show', 'AdminUsersController@getShow');
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
    Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
    Route::controller('users', 'AdminUsersController');

    # User Role Management
    Route::get('roles/{role}/show', 'AdminRolesController@getShow');
    Route::get('roles/{role}/edit', 'AdminRolesController@getEdit');
    Route::post('roles/{role}/edit', 'AdminRolesController@postEdit');
    Route::post('roles/{role}/delete', 'AdminRolesController@postDelete');
    Route::controller('roles', 'AdminRolesController');


    Route::post('images/upload', 'AdminImagesController@postUpload');
    Route::controller('images', 'AdminImagesController');
    # Admin Dashboard
    Route::controller('/', 'AdminDashboardController');
});

// Confide routes
//Route::get( 'user/create',                 'UserController@create');
//Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');


Route::get( '/files/imageSrc',                 'FilesController@getImageSrc');
Route::get( '/files/image',                 'FilesController@getImage');

Route::get( '/',                 'HomeController@getIndex');