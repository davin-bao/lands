<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-4-30
 * Time: 下午10:09
 */
class ContactController extends BaseController {

    public function getIndex()
    {
        //echo Config::get('app.front_template').'index';exit;
    }

    public function getShow(){

        $services = Business::where('freeze','=','0')->orderBy('order', 'DESC')->take(4)->get();
        $setting = Setting::find(1);
        return View::make(Config::get('app.front_template').'/contact_show', compact('services','setting'));
    }

}