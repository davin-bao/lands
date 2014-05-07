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

        // Grab all the users
        $infos = Info::paginate(Config::get('app.pagenate_num'));

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
            //return Redirect::to('admin/infos/' . $this->info->id . '/edit')->with('success', Lang::get('admin/infos/messages.create.success'));
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
//
//  public function getBindingFlow($entry){
//    //
//    if ( $entry->id )
//    {
//      $flows = $entry->getFlows('infos');
//      //if this resource has binded flow, go to audit flow
//      if($entry->isBindingFlow()){
//        return Redirect::to('admin/infos/' . $entry->id . '/audit');
//      }
//
//      //if no flow, return success
//      if(!$flows || $flows->count() <= 0){
//        return Redirect::to('admin/infos/' . $entry->id . '/edit')->with('success', Lang::get('admin/infos/messages.create.success'));
//      }else if($flows->count() == 1){
//        //if flow is only one, binding it
//        $entry->bindingFlow($flows->first()->id);
//        return Redirect::to('admin/infos/' . $entry->id . '/audit');
//      }
//      //if have muliti flows, show list for user select
//      return View::make(Config::get('app.admin_template').'/flows/binding', compact('entry', 'flows'));
//    } else {
//      return Redirect::to('admin/infos')->with('error', Lang::get('admin/infos/messages.does_not_exist'));
//    }
//  }
//
//  public function postBindingFlow($entry){
//    if( $entry->id ){
//        $entry->bindingFlow(Input::get( 'flow_id' ));
//        return Redirect::to('admin/infos/' . $entry->id . '/audit');
//    } else {
//      return Redirect::to('admin/infos')->with('error', Lang::get('admin/infos/messages.does_not_exist'));
//    }
//  }
//
//  public function getAudit($entry){
//    if( $entry->id ){
//        $nextAuditUsers = $entry->getNextAuditUsers();
//        $currentNode = $entry->getCurrentNode();
//      //if auditUsers is one person and this entry unstart, auto audited it
//      if(count($nextAuditUsers)==1 && $entry->status() == 'unstart'){
//        $result = $entry->startFlow($nextAuditUsers, $entry->info_name, $entry->info_content);
//        if($result){
//          return Redirect::to('admin/infos/' . $entry->id . '/edit')->with('success', Lang::get('workflow::workflow.action').Lang::get('workflow::workflow.success'));
//        }else{
//          return Redirect::to('admin/infos/' . $entry->id . '/edit')->with('error', Lang::get('workflow::workflow.action').Lang::get('workflow::workflow.failed_unknown'));
//        }
//      }else {
//        return View::make(Config::get('app.admin_template').'/flows/audit', compact('entry','nextAuditUsers','currentNode'));
//      }
//    } else {
//      return Redirect::to('admin/infos')->with('error', Lang::get('admin/infos/messages.does_not_exist'));
//    }
//  }
//
//  public function postAudit($entry){
//    if( $entry->id ){
//      $comment = Input::get( 'comment' );
//      $nextAuditUserIds = Input::get( 'audit_users' );
//      $nextAuditUsers = new \Illuminate\Database\Eloquent\Collection();
//      if($nextAuditUserIds && count($nextAuditUserIds)>0){
//        foreach($nextAuditUserIds as $id){
//          $nextAuditUsers->add(User::find($id));
//        }
//      }
//      $submit = Input::get( 'submit' );
//      switch($submit){
//        case 'agree':
//          $result = $entry->agree($comment, $nextAuditUsers, $entry->info_name, $entry->info_content);
//          break;
//        case 'discard':
//          $result = $entry->disagree('info' .'::discard', $comment, $entry->info_name, $entry->info_content);
//          break;
//        case 'gofirst':
//          $result = $entry->disagree('info' .'::goFirst', $comment, $entry->info_name, $entry->info_content);
//          break;
//      }
//
//      if($result){
//        return Redirect::to('admin/infos/' . $entry->id . '/edit')->with('success', Lang::get('workflow::workflow.action').Lang::get('workflow::workflow.success'));
//      }else{
//        return Redirect::to('admin/infos/' . $entry->id . '/edit')->with('error', Lang::get('workflow::workflow.action').Lang::get('workflow::workflow.failed_unknown'));
//      }
//    }
//    return Redirect::to('admin/infos')->with('error', Lang::get('admin/infos/messages.does_not_exist'));
//  }
}