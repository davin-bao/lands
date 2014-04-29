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
Route::model('carousel', 'Carousel');
Route::model('info', 'Info');
Route::model('introduction', 'Introduction');
Route::model('business', 'Business');
Route::model('setting', 'Setting');

Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('recruit', '[0-9]+');
Route::pattern('carousel', '[0-9]+');
Route::pattern('info', '[0-9]+');
Route::pattern('introduction', '[0-9]+');
Route::pattern('business', '[0-9]+');
Route::pattern('setting', '[0-9]+');

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{

    # Businesses Management
    Route::get('businesses/{business}/edit', 'AdminBusinessesController@getEdit');
    Route::post('businesses/{business}/edit', 'AdminBusinessesController@postEdit');
//    Route::get('businesses/{business}/delete', 'AdminBusinessesController@getDelete');
    Route::post('businesses/{business}/delete', 'AdminBusinessesController@postDelete');
    Route::controller('businesses', 'AdminBusinessesController');

    # Settings
    Route::get('settings/{setting}/edit', 'AdminSettingsController@getEdit');
    Route::post('settings/{setting}/edit', 'AdminSettingsController@postEdit');
    Route::controller('settings', 'AdminSettingsController');

    # Carousels Management
    Route::get('carousels/{carousel}/edit', 'AdminCarouselsController@getEdit');
    Route::post('carousels/{carousel}/edit', 'AdminCarouselsController@postEdit');
    Route::get('carousels/{carousel}/delete', 'AdminCarouselsController@getDelete');
    Route::post('carousels/{carousel}/delete', 'AdminCarouselsController@postDelete');
    Route::controller('carousels', 'AdminCarouselsController');

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
    Route::get('files/image', 'AdminImagesController@getImageUpload');
    Route::post('files/image', 'AdminImagesController@postImageUpload');
    Route::delete('files/image', 'AdminImagesController@deleteImageUpload');
    Route::controller('files', 'AdminImagesController');

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


Route::get( '/files/thumbnail',                 'FilesController@getThumbnail');
Route::get( '/files/image',                 'FilesController@getImage');

Route::get('infos/more_ajax', 'InfosController@getMoreAJAX');
Route::get('infos/{info}/show_ajax', 'InfosController@getShowAJAX');

Route::get('recruits/more_ajax', 'RecruitsController@getMoreAJAX');
Route::get('recruits/{recruit}/show_ajax', 'RecruitsController@getShowAJAX');

Route::get('businesses/{business}/show_ajax', 'BusinessesController@getShowAJAX');

Route::get( '/',                 'HomeController@getIndex');