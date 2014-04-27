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
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'The uploaded file was only partially uploaded',
            4 => 'No file was uploaded',
            6 => 'Missing a temporary folder',
            7 => 'Failed to write file to disk',
            8 => 'A PHP extension stopped the file upload',
            'post_max_size' => 'The uploaded file exceeds the post_max_size directive in php.ini',
            'max_file_size' => 'File is too big',
            'min_file_size' => 'File is too small',
            'accept_file_types' => 'Filetype not allowed',
            'max_number_of_files' => 'Maximum number of files exceeded',
            'max_width' => 'Image exceeds maximum width',
            'min_width' => 'Image requires a minimum width',
            'max_height' => 'Image exceeds maximum height',
            'min_height' => 'Image requires a minimum height',
            'abort' => 'File upload aborted',
            'image_resize' => 'Failed to resize image'
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