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
   * Returns the date of the Recruit creation,
   * on a good and more readable format :)
   *
   * @return string
   */
  public function getLogTitle()
  {
    return $this->info_name;
  }

  /**
   * Returns the date of the Recruit last update,
   * on a good and more readable format :)
   *
   * @return string
   */
  public function getLogContent()
  {
    return $this->info_content;
  }
}