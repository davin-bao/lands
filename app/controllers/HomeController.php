<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

  public function getIndex()
  {
      //echo Config::get('app.front_template').'index';exit;

      $setting = Setting::find(1);
      $services = Business::where('freeze','=','0')->orderBy('order', 'DESC')->take(4)->get();
      $infos = Info::where('freeze','=','0')->orderBy('updated_at', 'DESC')->take(5)->get();
    return View::make(Config::get('app.front_template').'index', compact('setting','services','infos'));
  }

}
