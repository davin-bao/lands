<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-29
 * Time: 下午4:48
 */

class InfosController extends BaseController {

  protected $info;
  public function __construct(Info $info){
    $this->info = $info;
  }

    public function getIndex()
    {
        $services = Business::where('freeze','=','0')->orderBy('order', 'DESC')->take(4)->get();
        $setting = Setting::find(1);
        $infos = Info::getCompletedList()->where('freeze','=','0')->orderBy('updated_at', 'DESC')->paginate(Config::get('app.pagenate_num'));

        // Show the page
        return View::make(Config::get('app.front_template').'/infos_index', compact('services','setting','infos'));
    }

    public function getShow($info)
    {
        $services = Business::where('freeze','=','0')->orderBy('order', 'DESC')->take(4)->get();
        $setting = Setting::find(1);
        $infos = Info::getCompletedList()->where('freeze','=','0')->orderBy('updated_at', 'DESC')->paginate(5);

        // Show the page
        return View::make(Config::get('app.front_template').'/infos_show', compact('services','setting','infos','info'));
    }

  public function getShowAJAX($info){
    $res = Array('result'=>true,'title'=>$info->info_name,'content'=>$info->info_content);
    echo json_encode($res);
  }

  public function getMoreAJAX(){
    $pageCount = intval(Config::get("app.pagenate_num"));
    $offset = intval(Input::get( 'offset' ));

    $infos =   Info::getCompletedList()->where('freeze','=','0')->orderBy('updated_at', 'DESC')->skip($offset*$pageCount)->take($pageCount)->get();

    $new_infos = array();
    foreach( $infos as $info) {
      $new_infos[] = array('id' => $info->id, 'title' => $info->info_name, 'created_at' => $info->created_at, 'content' => String::tidy(Str::limit(strip_tags($info->info_content, '<p><a>'), 100)));
    }
    $res = Array('result'=>true,'list'=>$new_infos);
    echo json_encode($res);
  }
}