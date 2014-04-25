<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 下午2:09
 */

class AdminImagesController extends AdminController {

  /**
   * Admin images
   *
   */
  public function postUpload()
  {
    $funcNum = $_GET['CKEditorFuncNum'] ;

    $mFile = new Mfile();
    $message = $mFile->create('image',$_FILES['upload'],2048000);
    $name = time()."_".$_FILES['upload']['name'];

    $url = URL::to('files/image?name=' . $name);

    $funcNum = $_GET['CKEditorFuncNum'] ;
    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
  }
}