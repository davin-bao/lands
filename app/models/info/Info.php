<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:27
 */

use DavinBao\Workflow\HasFlowForResource;

class Info extends \LaravelBook\Ardent\Ardent {
  use HasFlowForResource;

  protected $table = 'infos';

  /**
   * Ardent validation rules
   *
   * @var array
   */
  public static $rules = array(
    'info_name' => 'required',
    'info_content' => 'required',
  );

  /**
   * Returns the title of the Info log
   *
   * @return string
   */
  public function getLogTitle()
  {
    return $this->info_name;
  }

  /**
   * Returns the Content of the Info log
   *
   * @return string
   */
  public function getLogContent()
  {
    return $this->info_content;
  }
}