<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:37
 */

class AdminSettingsController extends AdminController {

  protected $setting;
  public function __construct(Business $setting){
    $this->setting = $setting;
  }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function getIndex()
  {
    // Title
    $title = Lang::get('admin/settings/title.management');

    // Grab all the users
    $settings = Business::all();

    // Show the page
    return View::make(Config::get('app.admin_template').'/settings/index', compact('settings', 'title'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function getCreate()
  {
    // Title
    $title = Lang::get('admin/settings/title.create');
    // Mode
    $mode = 'create';
    // Show the page
    return View::make(Config::get('app.admin_template').'/settings/create_edit', compact('title', 'mode'));
  }

  public function postCreate()
  {
      $this->setting->site_url = Input::get( 'site_url' );
      $this->setting->company_name = Input::get( 'company_name' );
      $this->setting->master_email = Input::get( 'master_email' );
      $this->setting->address = Input::get( 'address' );
      $this->setting->service_phone = Input::get( 'service_phone' );
      $this->setting->mobile = Input::get( 'mobile' );
      $this->setting->company_instroductions = Input::get( 'company_instroductions' );
      $this->setting->services = Input::get( 'services' );
      $this->setting->contact = Input::get( 'contact' );

    if ($this->setting->save(Business::$rules) )
    {
      // Redirect to the new user page
      return Redirect::to('admin/settings/' . $this->setting->id . '/edit')->with('success', Lang::get('admin/settings/messages.create.success'));
    }
    else
    {
      // Get validation errors (see Ardent package)
      $error = $this->setting->errors()->all();

      return Redirect::to('admin/settings/create')
        ->with( 'error', $error );
    }
  }
    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($setting)
    {
        if ( $setting->id )
        {
            // Title
            $title = Lang::get('admin/settings/title.update');
            // mode
            $mode = 'edit';

            return View::make(Config::get('app.admin_template').'/settings/create_edit', compact('setting', 'mode'));
        }
        else
        {
            return Redirect::to('admin/settings')->with('error', Lang::get('admin/settings/messages.does_not_exist'));
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $setting
     * @return Response
     */
    public function postEdit($setting)
    {

        // Validate the inputs
        $validator = Validator::make(Input::all(), Setting::$rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $setting->site_url = Input::get( 'site_url' );
            $setting->company_name = Input::get( 'company_name' );
            $setting->master_email = Input::get( 'master_email' );
            $setting->address = Input::get( 'address' );
            $setting->service_phone = Input::get( 'service_phone' );
            $setting->mobile = Input::get( 'mobile' );
            $setting->company_instroductions = Input::get( 'company_instroductions' );
            $setting->services = Input::get( 'services' );
            $setting->contact = Input::get( 'contact' );
            // Was the role updated?
            if ($setting->save())
            {
                // Redirect to the role page
                return Redirect::to('admin/settings/' . $setting->id . '/edit')->with('success', Lang::get('admin/settings/messages.update.success'));
            }
            else
            {
                // Redirect to the role page
                return Redirect::to('admin/settings/' . $setting->id . '/edit')->with('error', Lang::get('admin/settings/messages.update.error'));
            }
        }

        // Form validation failed
        return Redirect::to('admin/settings/' . $setting->id . '/edit')->withInput()->withErrors($validator);
    }
    /**
     * Remove the specified user from storage.
     *
     * @param $setting
     * @internal param $id
     * @return Response
     */
    public function postDelete($setting)
    {
        // Was the role deleted?
        if($setting->delete()) {
            // Redirect to the role management page
            return Redirect::to('admin/settings')->with('success', Lang::get('admin/settings/messages.delete.success'));
        }

        // There was a problem deleting the role
        return Redirect::to('admin/settings')->with('error', Lang::get('admin/settings/messages.delete.error'));
    }
}