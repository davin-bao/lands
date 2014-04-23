<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-23
 * Time: 下午5:38
 */

class RepositoryServiceProvider extends ServiceProvider
{
  public function register()
  {
    //  binding interface HolidayRepository to the concrete implementation of EloquentHolidayRepository
    $this->app->bind(
      'UserRepository',
      function () {
        return new \User\UserRepository(new \User\User());
      }
    );
  }
}
