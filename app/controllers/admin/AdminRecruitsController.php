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

  public function postCreate()
  {
    $this->recruit->recruit_name = Input::get( 'recruit_name' );
    $this->recruit->recruit_count = Input::get( 'recruit_count' );
    $this->recruit->recruit_content = Input::get( 'recruit_content' );

    // The password confirmation will be removed from model
    // before saving. This field will be used in Ardent's
    // auto validation.
    $this->recruit->freeze = Input::get( 'freeze' );

    // Permissions are currently tied to roles. Can't do this yet.
    //$user->permissions = $user->roles()->preparePermissionsForSave(Input::get( 'permissions' ));

    // Save if valid. Password field will be hashed before save
    if($this->recruit->validate(Recruit::$rules, Recruit::$customMessages)) {
      $this->recruit->save();
    }

    if ( $this->recruit->id )
    {
      // Redirect to the new user page
      return Redirect::to('admin/recruits/' . $this->recruit->id . '/edit')->with('success', Lang::get('admin/recruits/messages.create.success'));
    }
    else
    {
      // Get validation errors (see Ardent package)
      $error = $this->recruit->errors()->all();

      return Redirect::to('admin/recruits/create')
        ->with( 'error', $error );
    }
  }
}