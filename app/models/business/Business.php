<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:27
 */

class Business extends \LaravelBook\Ardent\Ardent {

  protected $table = 'businesses';

  /**
   * Ardent validation rules
   *
   * @var array
   */
  public static $rules = array(
    'business_name' => 'required|alpha_dash',
    'business_content' => 'required',
    'order' => 'required|numeric',
  );

  /**
   * Returns the date of the Recruit creation,
   * on a good and more readable format :)
   *
   * @return string
   */
  public function created_at()
  {
    return $this->date($this->created_at);
  }

  /**
   * Returns the date of the Recruit last update,
   * on a good and more readable format :)
   *
   * @return string
   */
  public function updated_at()
  {
    return $this->date($this->updated_at);
  }
}