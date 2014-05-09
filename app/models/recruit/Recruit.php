<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:27
 */

class Recruit extends \LaravelBook\Ardent\Ardent {
  use \DavinBao\Workflow\HasFlowForResource;

  protected $table = 'recruits';

  /**
   * Ardent validation rules
   *
   * @var array
   */
  public static $rules = array(
    'recruit_name' => 'required|alpha_dash',
    'recruit_count' => 'required|numeric',
    'recruit_content' => 'required',
  );

  /**
   * Returns the title of the Recruit log
   *
   * @return string
   */
  public function getLogTitle()
  {
    return $this->recruit_name;
  }

  /**
   * Returns the Content of the Recruit log
   *
   * @return string
   */
  public function getLogContent()
  {
    return $this->recruit_count . ':'.$this->recruit_content;
  }
}