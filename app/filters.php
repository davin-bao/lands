<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('user/login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('user/login/');
});

// Check for role on all admin routes
$roles = Role::all();
$role_names = array();
foreach($roles as $role){
    array_push($role_names, $role->name);
};
Entrust::routeNeedsRole( 'admin*', $role_names, Redirect::to('/'), false );
//
//// Check for permissions on admin actions
Entrust::routeNeedsPermission( 'admin/infos*', 'manage_infos', Redirect::to('/admin') );
Entrust::routeNeedsPermission( 'admin/infos/create', 'create_infos', Redirect::to('/admin/infos') );
Entrust::routeNeedsPermission( 'admin/infos/*/delete', 'delete_infos', Redirect::to('/admin/infos') );
Entrust::routeNeedsPermission( 'admin/recruits*', 'manage_recruits', Redirect::to('/admin') );
Entrust::routeNeedsPermission( 'admin/recruits/create', 'create_recruits', Redirect::to('/admin/recruits') );
Entrust::routeNeedsPermission( 'admin/recruits/*/delete', 'delete_recruits', Redirect::to('/admin/recruits') );
Entrust::routeNeedsPermission( 'admin/carousels*', 'manage_carousels', Redirect::to('/admin') );
Entrust::routeNeedsPermission( 'admin/businesses*', 'manage_businesses', Redirect::to('/admin') );
Entrust::routeNeedsPermission( 'admin/settings*', 'manage_settings', Redirect::to('/admin') );
Entrust::routeNeedsPermission( 'admin/users*', 'manage_users', Redirect::to('/admin') );
Entrust::routeNeedsPermission( 'admin/roles*', 'manage_roles', Redirect::to('/admin') );


/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
  if (Session::getToken() != Input::get('csrf_token') &&  Session::getToken() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
/**
 * Set localc use browser language
 */
Route::filter('detectLang',  function($route, $request, $lang = 'auto')
{

  if($lang != "auto" && in_array($lang , Config::get('app.available_language')))
  {
    Config::set('app.locale', $lang);
  }else{
    $browser_lang = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
    $browser_lang = substr($browser_lang, 0,2);
    $userLang = (in_array($browser_lang, Config::get('app.available_language'))) ? $browser_lang : Config::get('app.locale');
    Config::set('app.locale', $userLang);
    App::setLocale($userLang);
  }
});