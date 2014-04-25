<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 下午3:30
 */

class Mfile {

  public  $server_path = '';
  public  $local_path = '';

  public function __construct()
  {
    $this->server_path = Config::get('app.url').'/app/storage/uploads/';
  }
    public function getUrl($type, $name)
    {
      return $this->server_path.$type.'/'.$name;
    }

    public function create($type, $file)
    {
      $file_path = storage_path().'\\uploads\\'.$type;
      if(is_dir($file_path)!=TRUE){
        $oldumask=umask(0);
        mkdir($file_path,0777,true);
        umask($oldumask);
      }
      $name = time()."_".$file['name'];
      $url = $file_path.'/'.$name;

      //extensive suitability check before doing anything with the file…
      if (($file == "none") OR (empty($file['name'])) )
      {
        $message = Lang::get('admin/upload.no_file');
      }
      else if ($file["size"] == 0)
      {
        $message = Lang::get('admin/upload.null_file');
      }
      else if ($file["size"] > Config::get('app.upload_image_max_size'))
      {
        $message = Lang::get('admin/upload.too_large_size');
      }
      else if ($type == 'image'AND ($file["type"] != "image/pjpeg") AND ($file["type"] != "image/jpeg") AND ($file["type"] != "image/png"))
      {
        $message = Lang::get('admin/upload.not_image');
      }
      else if (!is_uploaded_file($file["tmp_name"]))
      {
        $message = Lang::get('admin/upload.hack');
      }
      else {
        $message = "";
        $move = @ move_uploaded_file($file['tmp_name'], $url);
        if(!$move)
        {
          $message = Lang::get('admin/upload.no_permission');
        }
      }
      return $message;
    }
}