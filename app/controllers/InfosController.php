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
    //echo Config::get('app.front_template').'index';exit;
  }

  public function getShowAJAX($info){
    $res = Array('result'=>true,'title'=>$info->info_name,'content'=>$info->info_content);
    echo json_encode($res);
  }

  public function getMoreAJAX(){
    $pageCount = intval(Config::get("app.pagenate_num"));
    $offset = intval(Input::get( 'offset' ));

    $infos =  Info::where('freeze','=','0')->orderBy('updated_at', 'DESC')->skip($offset*$pageCount)->take($pageCount)->get();

    $new_infos = array();
    foreach( $infos as $info) {
      $new_infos[] = array('id' => $info->id, 'title' => $info->info_name, 'created_at' => $info->created_at, 'content' => String::tidy(Str::limit(strip_tags($info->info_content, '<p><a>'), 100)));
    }
    $res = Array('result'=>true,'list'=>$new_infos);
    echo json_encode($res);
  }
}