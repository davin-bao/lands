<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-29
 * Time: 下午5:00
 */
class RecruitsController extends BaseController {

  protected $recruit;
  public function __construct(Recruit $recruit){
    $this->recruit = $recruit;
  }

  public function getIndex()
  {
    //echo Config::get('app.front_template').'index';exit;
  }

  public function getShowAJAX($recruit){
    $res = Array('result'=>true,'title'=>$recruit->recruit_name,'count'=>$recruit->recruit_count,'content'=>$recruit->recruit_content,);
    echo json_encode($res);
  }

}