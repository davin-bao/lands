<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-29
 * Time: 下午4:48
 */

class BusinessesController extends BaseController {

  protected $business;
  public function __construct(Business $business){
    $this->business = $business;
  }

    public function getIndex()
    {
        $services = Business::where('freeze','=','0')->orderBy('order', 'DESC')->get();
        $setting = Setting::find(1);
        $infos = Info::getCompletedList()->where('freeze','=','0')->orderBy('updated_at', 'DESC')->paginate(Config::get('app.pagenate_num'));

        // Show the page
        return View::make(Config::get('app.front_template').'/businesses_index', compact('services','setting','infos'));
    }

    public function getShow($business)
    {
        $services = Business::where('freeze','=','0')->orderBy('order', 'DESC')->take(4)->get();
        $setting = Setting::find(1);
        $infos = Info::getCompletedList()->where('freeze','=','0')->orderBy('updated_at', 'DESC')->paginate(5);

        // Show the page
        return View::make(Config::get('app.front_template').'/businesses_show', compact('services','setting','infos','business'));
    }

  public function getShowAJAX($business){
    $res = Array('result'=>true,'title'=>$business->business_name,'content'=>$business->business_content,);
    echo json_encode($res);
  }

}