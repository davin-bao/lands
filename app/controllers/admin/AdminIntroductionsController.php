<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:37
 */

class AdminIntroductionsController extends AdminController {

  protected $introduction;
  public function __construct(Introduction $introduction){
    $this->introduction = $introduction;
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function getIndex()
  {
    // Title
    $title = Lang::get('admin/introductions/title.management');

    // Grab all the users
    $introductions = Introduction::all();

    // Show the page
    return View::make('admin/introductions/index', compact('introductions', 'title'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function getCreate()
  {
    // Title
    $title = Lang::get('admin/introductions/title.create');
    // Mode
    $mode = 'create';
    // Show the page
    return View::make('admin/introductions/create_edit', compact('title', 'mode'));
  }

  public function postCreate()
  {
    $this->introduction->introduction_name = Input::get( 'introduction_name' );
    $this->introduction->introduction_content = Input::get( 'introduction_content' );

    if ($this->introduction->save(Introduction::$rules) )
    {
      // Redirect to the new user page
      return Redirect::to('admin/introductions/' . $this->introduction->id . '/edit')->with('success', Lang::get('admin/introductions/messages.create.success'));
    }
    else
    {
      // Get validation errors (see Ardent package)
      $error = $this->introduction->errors()->all();

      return Redirect::to('admin/introductions/create')
        ->with( 'error', $error );
    }
  }
    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($introduction)
    {
        if ( $introduction->id )
        {
            // Title
            $title = Lang::get('admin/introductions/title.update');
            // mode
            $mode = 'edit';

            return View::make('admin/introductions/create_edit', compact('introduction', 'mode'));
        }
        else
        {
            return Redirect::to('admin/introductions')->with('error', Lang::get('admin/introductions/messages.does_not_exist'));
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $introduction
     * @return Response
     */
    public function postEdit($introduction)
    {

        // Validate the inputs
        $validator = Validator::make(Input::all(), Introduction::$rules);

        // Check if the form validates with success
        if ($validator->passes())
        {

            $introduction->introduction_name = Input::get( 'introduction_name' );
            $introduction->introduction_content = Input::get( 'introduction_content' );
            // Was the role updated?
            if ($introduction->save())
            {
                // Redirect to the role page
                return Redirect::to('admin/introductions/' . $introduction->id . '/edit')->with('success', Lang::get('admin/introductions/messages.update.success'));
            }
            else
            {
                // Redirect to the role page
                return Redirect::to('admin/introductions/' . $introduction->id . '/edit')->with('error', Lang::get('admin/introductions/messages.update.error'));
            }
        }

        // Form validation failed
        return Redirect::to('admin/introductions/' . $introduction->id . '/edit')->withInput()->withErrors($validator);
    }
    /**
     * Remove the specified user from storage.
     *
     * @param $introduction
     * @internal param $id
     * @return Response
     */
    public function postDelete($introduction)
    {
        // Was the role deleted?
        if($introduction->delete()) {
            // Redirect to the role management page
            return Redirect::to('admin/introductions')->with('success', Lang::get('admin/introductions/messages.delete.success'));
        }

        // There was a problem deleting the role
        return Redirect::to('admin/introductions')->with('error', Lang::get('admin/introductions/messages.delete.error'));
    }
}