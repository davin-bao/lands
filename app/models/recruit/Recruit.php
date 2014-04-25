<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:27
 */

class Recruit extends \LaravelBook\Ardent\Ardent {

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
  public static $customMessages = array(
    'required' => 'The :attribute field is required.',
    'numeric' => 'The :attribute must be a number.',
  );

  public function __construct(){
    $str_required = Lang::get('admin/recruits/messages.validation.required');
    $this->customMessages = array(
      'required' => $str_required,
      'numeric' => $str_required,
    );
  }
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