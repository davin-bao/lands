<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:37
 */

class AdminRecruitsController extends AdminController {
  use \DavinBao\Workflow\HasFlowForResourceController;

  protected $recruit;
  protected $entryName = 'recruits';
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

      $recruits = array();
      switch(Input::get('s')){
          case 'audit':
              $recruits = Recruit::getAuditList()->paginate(Config::get('app.pagenate_num'));
              break;
          case 'completed':
              $recruits = Recruit::getCompletedList()->paginate(Config::get('app.pagenate_num'));
              break;
          default:
              $recruits = Recruit::orderBy('updated_at', 'DESC')->paginate(Config::get('app.pagenate_num'));
              break;
      }

    // Show the page
    return View::make(Config::get('app.admin_template').'/recruits/index', compact('recruits', 'title'));
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
    $entryName = $this->entryName;
    // Show the page
    return View::make(Config::get('app.admin_template').'/recruits/create_edit', compact('title','entryName', 'mode'));
  }

  public function postCreate()
  {
    $this->recruit->recruit_name = Input::get( 'recruit_name' );
    $this->recruit->recruit_count = Input::get( 'recruit_count' );
    $this->recruit->recruit_content = Input::get( 'recruit_content' );

    // before saving. This field will be used in Ardent's
    // auto validation.
    $this->recruit->freeze = Input::get( 'freeze' );

    if ($this->recruit->save(Recruit::$rules) )
    {
      return Redirect::to('admin/recruits/' . $this->recruit->id . '/binding');
      //return Redirect::to('admin/recruits/' . $this->recruit->id . '/edit')->with('success', Lang::get('admin/recruits/messages.create.success'));
    }
    else
    {
      // Get validation errors (see Ardent package)
      $error = $this->recruit->errors()->all();

      return Redirect::to('admin/recruits/create')
        ->with( 'error', $error );
    }
  }
    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($entry)
    {
        if ( $entry->id )
        {
            // Title
            $title = Lang::get('admin/recruits/title.update');
            // mode
            $mode = 'edit';
            $entryName = $this->entryName;

            return View::make(Config::get('app.admin_template').'/recruits/create_edit', compact('entry','entryName', 'mode'));
        }
        else
        {
            return Redirect::to('admin/recruits')->with('error', Lang::get('admin/recruits/messages.does_not_exist'));
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $recruit
     * @return Response
     */
    public function postEdit($recruit)
    {

        // Validate the inputs
        $validator = Validator::make(Input::all(), Recruit::$rules);

        // Check if the form validates with success
        if ($validator->passes())
        {

            $recruit->recruit_name = Input::get( 'recruit_name' );
            $recruit->recruit_count = Input::get( 'recruit_count' );
            $recruit->recruit_content = Input::get( 'recruit_content' );
            // Was the role updated?
            if ($recruit->save())
            {
              return Redirect::to('admin/recruits/' . $recruit->id . '/binding');
                //return Redirect::to('admin/recruits/' . $recruit->id . '/edit')->with('success', Lang::get('admin/recruits/messages.update.success'));
            }
            else
            {
                // Redirect to the role page
                return Redirect::to('admin/recruits/' . $recruit->id . '/edit')->with('error', Lang::get('admin/recruits/messages.update.error'));
            }
        }

        // Form validation failed
        return Redirect::to('admin/recruits/' . $recruit->id . '/edit')->withInput()->withErrors($validator);
    }
    /**
     * Remove the specified user from storage.
     *
     * @param $recruit
     * @internal param $id
     * @return Response
     */
    public function postDelete($recruit)
    {
        // Was the role deleted?
        if($recruit->delete()) {
            // Redirect to the role management page
            return Redirect::to('admin/recruits')->with('success', Lang::get('admin/recruits/messages.delete.success'));
        }

        // There was a problem deleting the role
        return Redirect::to('admin/recruits')->with('error', Lang::get('admin/recruits/messages.delete.error'));
    }

    public function postPreview(){
        $recruit = new Recruit();
        $data = Input::all();
        $recruit->recruit_name = $data['recruit_name'];
        $recruit->recruit_count = $data[ 'recruit_count'];
        $recruit->recruit_content =  $data['recruit_content' ];
        $recruit->freeze =  $data[ 'freeze' ];
        $recruit->created_at = date("Y-m-d");
        $recruit->updated_at = date("Y-m-d");

        $services = Business::where('freeze','=','0')->orderBy('order', 'DESC')->take(4)->get();
        $setting = Setting::find(1);
        $infos = Info::orderBy('updated_at', 'DESC')->paginate(5);

        return View::make(Config::get('app.front_template').'/recruits_show', compact('services','setting','infos','recruit'));
    }
}