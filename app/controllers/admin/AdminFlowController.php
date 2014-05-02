<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-5-2
 * Time: 下午1:33
 */

class AdminFlowController extends AdminController {

  protected $flow;
  public function __construct(Flow $flow){
    $this->flow = $flow;
  }
  /**
   * Admin dashboard
   *
   */
  public function getCreate()
  {
    $title = Lang::get('admin/infos/title.create');
    // Show the page
    return View::make(Config::get('app.admin_template').'/flows/create_edit', compact('title'));
  }

  public function postCreate(){
    $this->flow = new Flow();
    $this->flow->name = Input::get('name');

    if ($this->flow->save(Flow::$rules) )
    {
      $res = Array('result'=>true,'id'=>$this->flow->id, 'message'=>Lang::get('workflow::workflow.saved'));
    }
    else
    {
      // Get validation errors (see Ardent package)
      $error = $this->flow->errors()->all();
      $res = Array('result'=>false,'id'=>1, 'message'=>$error);
    }

    echo json_encode($res);
  }

  public function getEdit($flow) {
    if ( $flow->id )
    {
      $title = Lang::get('admin/infos/title.create');
      // Show the page
      return View::make(Config::get('app.admin_template').'/flows/create_edit', compact('title', 'flow'));
    }
    else
    {
      return Redirect::to('admin/flows')->with('error', Lang::get('workflow::workflow.does_not_exist'));
    }
  }

  public function postEdit($flow){

    // Validate the inputs
    $validator = Validator::make(Input::all(), Flow::$rules);

    // Check if the form validates with success
    if ($validator->passes())
    {
      $flow->name = Input::get( 'name' );
      // Was the role updated?
      if ($flow->save())
      {
        $res = Array('result'=>true,'id'=>$flow->id, 'message'=>Lang::get('workflow::workflow.saved'));
      }
      else
      {
        // Redirect to the role page
        $res = Array('result'=>false,'id'=>$flow->id, 'message'=>Lang::get('admin/infos/messages.update.error'));
      }
    }else{
      $res = Array('result'=>false,'id'=>$flow->id, 'message'=>$validator->errors()->all());
    }

    echo json_encode($res);
  }

  public function postCreatenode(){
    $res = Array('result'=>true,'id'=>1,'name'=>Lang::get('workflow::workflow.node'),'users'=>'jack,david','roles'=>'admins,users', 'message'=>Lang::get('workflow::workflow.saved'));
    echo json_encode($res);
  }
}