<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:37
 */

class AdminBusinessesController extends AdminController {

  protected $business;
  public function __construct(Business $business){
    $this->business = $business;
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function getIndex()
  {
    // Title
    $title = Lang::get('admin/businesses/title.management');

    // Grab all the users
    $businesses = Business::all();

    // Show the page
    return View::make('admin/businesses/index', compact('businesses', 'title'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function getCreate()
  {
    // Title
    $title = Lang::get('admin/businesses/title.create');
    // Mode
    $mode = 'create';
    // Show the page
    return View::make('admin/businesses/create_edit', compact('title', 'mode'));
  }

  public function postCreate()
  {
    $this->business->business_name = Input::get( 'business_name' );
    $this->business->business_content = Input::get( 'business_content' );

    if ($this->business->save(Business::$rules) )
    {
      // Redirect to the new user page
      return Redirect::to('admin/businesses/' . $this->business->id . '/edit')->with('success', Lang::get('admin/businesses/messages.create.success'));
    }
    else
    {
      // Get validation errors (see Ardent package)
      $error = $this->business->errors()->all();

      return Redirect::to('admin/businesses/create')
        ->with( 'error', $error );
    }
  }
    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($business)
    {
        if ( $business->id )
        {
            // Title
            $title = Lang::get('admin/businesses/title.update');
            // mode
            $mode = 'edit';

            return View::make('admin/businesses/create_edit', compact('business', 'mode'));
        }
        else
        {
            return Redirect::to('admin/businesses')->with('error', Lang::get('admin/businesses/messages.does_not_exist'));
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $business
     * @return Response
     */
    public function postEdit($business)
    {

        // Validate the inputs
        $validator = Validator::make(Input::all(), Business::$rules);

        // Check if the form validates with success
        if ($validator->passes())
        {

            $business->business_name = Input::get( 'business_name' );
            $business->business_content = Input::get( 'business_content' );
            // Was the role updated?
            if ($business->save())
            {
                // Redirect to the role page
                return Redirect::to('admin/businesses/' . $business->id . '/edit')->with('success', Lang::get('admin/businesses/messages.update.success'));
            }
            else
            {
                // Redirect to the role page
                return Redirect::to('admin/businesses/' . $business->id . '/edit')->with('error', Lang::get('admin/businesses/messages.update.error'));
            }
        }

        // Form validation failed
        return Redirect::to('admin/businesses/' . $business->id . '/edit')->withInput()->withErrors($validator);
    }
    /**
     * Remove the specified user from storage.
     *
     * @param $business
     * @internal param $id
     * @return Response
     */
    public function postDelete($business)
    {
        // Was the role deleted?
        if($business->delete()) {
            // Redirect to the role management page
            return Redirect::to('admin/businesses')->with('success', Lang::get('admin/businesses/messages.delete.success'));
        }

        // There was a problem deleting the role
        return Redirect::to('admin/businesses')->with('error', Lang::get('admin/businesses/messages.delete.error'));
    }
}