<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:27
 */

class Setting extends \LaravelBook\Ardent\Ardent {

  protected $table = 'settings';
    //关闭自动维护 created_at 和 updated_at 字段
  public $timestamps = false;
  /**
   * Ardent validation rules
   *
   * @var array
   */
  public static $rules = array(
      'site_url' => 'required',
      'company_name'=>'required'
  );

}