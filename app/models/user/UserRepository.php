<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-23
 * Time: 下午5:02
 */
use Ipunkt\LaravelRepositories\EloquentRepository;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
  public function __construct(User $user)
  {
    $this->model = $user;
  }

  // This class only implements methods specific to the UserRepository
  public function findUserByUsername($username)
  {
    $where = call_user_func_array("{$this->modelClassName}::where", array($username));
    return $where->get();
  }

  public function getEmailByReminderToken( $token )
  {
    $email = $this->app['db']->connection()->table('password_reminders')
      ->select('email')->where('token','=',$token)
      ->first();

    if ($email && is_object($email))
    {
      $email = $email->email;
    }
    elseif ($email && is_array($email))
    {
      $email = $email['email'];
    }

    return $email;
  }

  public function getUserByMail( $email )
  {
    $user = $this->model->where('email', '=', $email)->get()->first();

    return $user;
  }
}