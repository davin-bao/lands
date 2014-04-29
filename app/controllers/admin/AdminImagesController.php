<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 下午2:09
 */

class AdminImagesController extends AdminController {

    protected $uploadHandler;
    public function __construct(){
        $error_messages = array(
            1 => Lang::get('admin/upload.upload_max_filesize'),
            2 => Lang::get('admin/upload.max_file_size'),
            3 => Lang::get('admin/upload.only_partially'),
            4 => Lang::get('admin/upload.no_files'),
            6 => Lang::get('admin/upload.temporary_folder'),
            7 => Lang::get('admin/upload.write_failed'),
            8 => Lang::get('admin/upload.extension_stoped'),
            'post_max_size' => Lang::get('admin/upload.post_max_size'),
            'max_file_size' => Lang::get('admin/upload.max_file_size'),
            'min_file_size' => Lang::get('admin/upload.min_file_size'),
            'accept_file_types' => Lang::get('admin/upload.accept_file_types'),
            'max_number_of_files' => Lang::get('admin/upload.max_number_of_files'),
            'max_width' => Lang::get('admin/upload.max_width'),
            'min_width' => Lang::get('admin/upload.min_width'),
            'max_height' => Lang::get('admin/upload.max_height'),
            'min_height' => Lang::get('admin/upload.min_height'),
            'abort' => Lang::get('admin/upload.abort'),
            'image_resize' => Lang::get('admin/upload.image_resize')
        );

        $options = array(
            'upload_dir' => storage_path().'\\uploads\\images\\',
            'upload_url' => URL::to('files/image?name='),
            'param_name' => 'upload',
            'discard_aborted_uploads' => false,
            'max_file_size' => 1024*1024*2
        );

        $this->uploadHandler = new UploadHandler($options, false, $error_messages);

        if($this->uploadHandler->get_server_var('REQUEST_METHOD')== 'OPTIONS'|| $this->uploadHandler->get_server_var('REQUEST_METHOD')== 'HEAD'){
                $this->head();
        }
    }
  /**
   * Admin images
   *
   */
  public function postUpload()
  {
    $response = $this->uploadHandler->post(false);
    $message = '';
     $url='';

    if(is_array($response['upload']) && count($response['upload'])>0){
        $file = $response['upload'][0];
        if(isset($file->error)){
            $message = $file->error;
        }else{
            $url = $file->url;
        }
    }else {
        $message = "";
    }
     //$name = time()."_".$_FILES['upload']['name'];

    $funcNum = $_GET['CKEditorFuncNum'] ;
    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
  }

    public function postImageUpload(){
        $this->uploadHandler->post();
    }

    public function getImageUpload(){
        $this->uploadHandler->get();
    }
    public function deleteImageUpload(){
        $this->uploadHandler->delete();
    }
}