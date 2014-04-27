<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 下午2:58
 */

class FilesController extends BaseController {

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

    public function getImage(){
        $imgsrc = storage_path().'\\uploads\\images\\'.Input::get('name');
        $info=getimagesize($imgsrc);
        header("content-type:".$info['mime']);
        echo fread(fopen($imgsrc,'rb'),filesize($imgsrc));
    }

    public function getThumbnail(){
        $imgsrc = storage_path().'\\uploads\\images\\thumbnail\\'.Input::get('name');
        $info=getimagesize($imgsrc);
        header("content-type:".$info['mime']);
        echo fread(fopen($imgsrc,'rb'),filesize($imgsrc));
    }

}