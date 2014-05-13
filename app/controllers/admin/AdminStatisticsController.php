<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-5-12
 * Time: 下午1:08
 */
use DavinBao\Statistics\StatisticsStatistic;
use DavinBao\Statistics\HasStatisticsController;

class AdminStatisticsController extends AdminController {
  use HasStatisticsController;

    protected $entry;
    protected $entryName = 'recruits';
    public function __construct(StatisticsStatistic $entry){
        $this->entry = $entry;
    }

  public function getIndex(){
        $entries =StatisticsStatistic::paginate(Config::get('app.pagenate_num'));

      $title = Lang::get('statistics::statistics.statistics');
      return \View::make(\Config::get('app.admin_template').'/statistics/index', compact('title','entries'));
  }

  public function getCreate(){

      // Title

      $title = Lang::get('statistics::statistics.statistics').Lang::get('statistics::statistics.create');
      // Mode
      $mode = 'create';
      // Show the page
      return View::make(Config::get('app.admin_template').'/statistics/create_edit', compact('title', 'mode'));
  }


    public function postCreate()
    {
        $this->entry->name = Input::get( 'name' );
        $this->entry->column_names = Input::get( 'column_names' );
        $this->entry->type = Input::get( 'type' );
        $this->entry->sql = Input::get( 'sql' );

        if ($this->entry->save(StatisticsStatistic::$rules) )
        {
            // Redirect to the new user page
            return Redirect::to('admin/statistics/' . $this->entry->id . '/edit')->with('success', Lang::get('admin/recruits/messages.create.success'));
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $this->entry->errors()->all();

            return Redirect::to('admin/statistics/create')
                ->with( 'error', $error );
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($recruit)
    {
        if ( $recruit->id )
        {
            // Title
            $title = Lang::get('statistics::statistics.statistics').Lang::get('statistics::statistics.update');
            // mode
            $mode = 'edit';

            return View::make(Config::get('app.admin_template').'/statistics/create_edit', compact('recruit', 'mode'));
        }
        else
        {
            return Redirect::to('admin/statistics')->with('error', Lang::get('admin/recruits/messages.does_not_exist'));
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param $recruit
     * @return Response
     */
    public function postEdit($entry)
    {

        // Validate the inputs
        $validator = Validator::make(Input::all(), Recruit::$rules);

        // Check if the form validates with success
        if ($validator->passes())
        {

            $entry->name = Input::get( 'name' );
            $entry->column_names = Input::get( 'column_names' );
            $entry->type = Input::get( 'type' );
            $entry->sql = Input::get( 'sql' );
            // Was the role updated?
            if ($entry->save())
            {
                // Redirect to the role page
                return Redirect::to('admin/statistics/' . $entry->id . '/edit')->with('success', Lang::get('admin/recruits/messages.update.success'));
            }
            else
            {
                // Redirect to the role page
                return Redirect::to('admin/statistics/' . $entry->id . '/edit')->with('error', Lang::get('admin/recruits/messages.update.error'));
            }
        }

        // Form validation failed
        return Redirect::to('admin/statistics/' . $entry->id . '/edit')->withInput()->withErrors($validator);
    }
    /**
     * Remove the specified user from storage.
     *
     * @param $recruit
     * @internal param $id
     * @return Response
     */
    public function postDelete($entry)
    {
        // Was the role deleted?
        if($entry->delete()) {
            // Redirect to the role management page
            return Redirect::to('admin/statistics')->with('success', Lang::get('admin/recruits/messages.delete.success'));
        }

        // There was a problem deleting the role
        return Redirect::to('admin/statistics')->with('error', Lang::get('admin/recruits/messages.delete.error'));
    }

}