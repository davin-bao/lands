<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:27
 */

class Setting extends \LaravelBook\Ardent\Ardent {

  protected $table = 'settings';

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