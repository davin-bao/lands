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
      $services = Business::where('freeze','=','0')->orderBy('order', 'DESC')->take(4)->get();
      $setting = Setting::find(1);
      $recruits = Recruit::getCompletedList()->where('freeze','=','0')->orderBy('updated_at', 'DESC')->paginate(5);
      $infos = Info::getCompletedList()->where('freeze','=','0')->orderBy('updated_at', 'DESC')->paginate(5);

      // Show the page
      return View::make(Config::get('app.front_template').'/recruits_index', compact('services','setting','infos','recruits'));
  }

    public function getShow($recruit)
    {
        $services = Business::getCompletedList()->where('freeze','=','0')->orderBy('order', 'DESC')->take(4)->get();
        $setting = Setting::find(1);
        $infos = Info::getCompletedList()->where('freeze','=','0')->orderBy('updated_at', 'DESC')->paginate(5);

        // Show the page
        return View::make(Config::get('app.front_template').'/recruits_show', compact('services','setting','infos','recruit'));
    }

  public function getShowAJAX($recruit){
    $res = Array('result'=>true,'title'=>$recruit->recruit_name,'count'=>$recruit->recruit_count,'content'=>$recruit->recruit_content,);
    echo json_encode($res);
  }

    public function getMoreAJAX(){
        $pageCount = intval(Config::get("app.pagenate_num"));
        $offset = intval(Input::get( 'offset' ));

        $recruits =  Recruit::getCompletedList()->where('freeze','=','0')->orderBy('updated_at', 'DESC')->skip($offset*$pageCount)->take($pageCount)->get();

        $new_recruits = array();
        foreach( $recruits as $recruit) {
            $new_recruits[] = array('id' => $recruit->id, 'title' => $recruit->recruit_name, 'count' => $recruit->recruit_count, 'content' => String::tidy(Str::limit(strip_tags($recruit->recruit_content, '<p><a>'), 100)));
        }
        $res = Array('result'=>true,'list'=>$new_recruits);
        echo json_encode($res);
    }

}