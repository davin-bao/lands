<?php

class BaseController extends Controller {

  public function __construct()
  {
    $this->beforeFilter('csrf', array('on' => 'post'));
  }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    protected function getPaginateData($arrData = array(), $perPage = 0){
        $currentPage = \Paginator::getCurrentPage();
        return array_slice($arrData, ($currentPage-1) * $perPage, $perPage);
    }
    protected function getPaginateLinks($arrData = array(), $perPage = 0){
        return \Paginator::make($arrData, count($arrData), $perPage)->links();
    }

}
