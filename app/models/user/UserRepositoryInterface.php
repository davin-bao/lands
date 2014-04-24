<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-4-23
 * Time: 下午5:05
 */
use Ipunkt\LaravelRepositories\Contracts\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface {

  public function findUserByUsername($username);

}