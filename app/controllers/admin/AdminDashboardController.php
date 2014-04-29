<?php

class AdminDashboardController extends AdminController {

    /**
     * Admin dashboard
     *
     */
    public function getIndex()
    {
      $infos = Info::paginate(Config::get('app.pagenate_num'));
      $recruits = Recruit::paginate(Config::get('app.pagenate_num'));
        return \View::make(Config::get('app.admin_template').'/dashboard', compact('infos','recruits'));
    }

}