<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:27
 */

class Carousel extends \LaravelBook\Ardent\Ardent {

  protected $table = 'carousels';

  /**
   * Ardent validation rules
   *
   * @var array
   */
  public static $rules = array(
    'carousel_image' => 'required',
    'carousel_content' => 'required',
      'order' => 'required|numeric',
  );

  /**
   * Returns the date of the Carousel creation,
   * on a good and more readable format :)
   *
   * @return string
   */
  public function created_at()
  {
    return $this->date($this->created_at);
  }

  /**
   * Returns the date of the Carousel last update,
   * on a good and more readable format :)
   *
   * @return string
   */
  public function updated_at()
  {
    return $this->date($this->updated_at);
  }
}