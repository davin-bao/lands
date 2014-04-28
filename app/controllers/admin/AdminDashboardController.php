<?php

class AdminDashboardController extends AdminController {

    /**
     * Admin dashboard
     *
     */
    public function getIndex()
    {

        return \View::make(Config::get('app.admin_template').'/dashboard');
    }

}