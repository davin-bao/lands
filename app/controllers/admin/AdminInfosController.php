<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-25
 * Time: 上午10:37
 */

class AdminInfosController extends AdminController {
  use \DavinBao\Workflow\HasFlowForResourceController;

    protected $info;
    protected $entryName = 'infos';
    public function __construct(Info $info){
        $this->info = $info;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/infos/title.management');
        $infos = array();
        switch(Input::get('s')){
            case 'audit':
                $infos = Info::getAuditList()->paginate(Config::get('app.pagenate_num'));
                break;
            case 'completed':
                $infos = Info::getCompletedList()->paginate(Config::get('app.pagenate_num'));
                break;
            default:
                $infos = Info::orderBy('updated_at', 'DESC')->paginate(Config::get('app.pagenate_num'));
                break;
        }

        // Show the page
        return View::make(Config::get('app.admin_template').'/infos/index', compact('infos', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        // Title
        $title = Lang::get('admin/infos/title.create');
        // Mode
        $mode = 'create';
        // Show the page
        return View::make(Config::get('app.admin_template').'/infos/create_edit', compact('title', 'mode'));
    }

    public function postCreate()
    {
        $this->info->info_name = Input::get( 'info_name' );
        $this->info->image = Input::get( 'image' );
        $this->info->info_content = Input::get( 'info_content' );
        $this->info->freeze = Input::get( 'freeze' );

        // before saving. This field will be used in Ardent's
        // auto validation.
        $this->info->freeze = Input::get( 'freeze' );

        if ($this->info->save(Info::$rules) )
        {
            // Redirect to the new user page
            return Redirect::to('admin/infos/' . $this->info->id . '/binding');
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $this->info->errors()->all();

            return Redirect::to('admin/infos/create')
                ->with( 'error', $error );
        }
    }

  /**
   * Show the form for editing the specified resource.
   *
   * @param $user
   * @return Response
   */
  public function getEdit($info)
  {
    if ( $info->id )
    {
      // Title
      //$title = Lang::get('admin/infos/title.update');
      // mode
      $mode = 'edit';

      return \View::make(\Config::get('app.admin_template').'/'.$this->entryName.'/create_edit', compact('info', 'mode'));
    }
    else
    {
      return \Redirect::to('admin/'.$this->entryName.'')->with('error', \Lang::get('admin/'.$this->entryName.'/messages.does_not_exist'));
    }
  }

    /**
     * Update the specified resource in storage.
     *
     * @param $info
     * @return Response
     */
    public function postEdit($info)
    {

        // Validate the inputs
        $validator = Validator::make(Input::all(), Info::$rules);

        // Check if the form validates with success
        if ($validator->passes())
        {

            $info->info_name = Input::get( 'info_name' );
            $info->image = Input::get( 'image' );
            $info->info_content = Input::get( 'info_content' );
            $info->freeze = Input::get( 'freeze' );
            // Was the role updated?
            if ($info->save())
            {
                // Redirect to the role page
                return Redirect::to('admin/infos/' . $info->id . '/binding');
            }
            else
            {
                // Redirect to the role page
                return Redirect::to('admin/infos/' . $info->id . '/edit')->with('error', Lang::get('admin/infos/messages.update.error'));
            }
        }

        // Form validation failed
        return Redirect::to('admin/infos/' . $info->id . '/edit')->withInput()->withErrors($validator);
    }
    /**
     * Remove the specified user from storage.
     *
     * @param $info
     * @internal param $id
     * @return Response
     */
    public function postDelete($info)
    {
        // Was the role deleted?
        if($info->delete()) {
            // Redirect to the role management page
            return Redirect::to('admin/infos')->with('success', Lang::get('admin/infos/messages.delete.success'));
        }

        // There was a problem deleting the role
        return Redirect::to('admin/infos')->with('error', Lang::get('admin/infos/messages.delete.error'));
    }

    public function postPreview(){
        $info = new Info();
        $data = Input::all();
        $info->info_name = $data['info_name'];
        $info->image = $data[ 'image'];
        $info->info_content =  $data['info_content' ];
        $info->freeze =  $data[ 'freeze' ];
        $info->created_at = date("Y-m-d");
        $info->updated_at = date("Y-m-d");

        $services = Business::where('freeze','=','0')->orderBy('order', 'DESC')->take(4)->get();
        $setting = Setting::find(1);
        $infos = Info::orderBy('updated_at', 'DESC')->paginate(5);

        return View::make(Config::get('app.front_template').'/infos_show', compact('services','setting','infos','info'));
    }
}