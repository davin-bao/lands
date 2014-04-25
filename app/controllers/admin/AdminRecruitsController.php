<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:37
 */

class AdminRecruitsController extends AdminController {

  protected $recruit;
  public function __construct(Recruit $recruit){
    $this->recruit = $recruit;
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function getIndex()
  {
    // Title
    $title = Lang::get('admin/recruits/title.management');

    // Grab all the users
    $recruits = Recruit::all();

    // Show the page
    return View::make('admin/recruits/index', compact('recruits', 'title'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function getCreate()
  {
    // Title
    $title = Lang::get('admin/recruits/title.create');

    // Mode
    $mode = 'create';



    // Show the page
    return View::make('admin/recruits/create_edit', compact('title', 'mode'));
  }
}