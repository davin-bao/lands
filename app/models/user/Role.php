<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-4-23
 * Time: 下午8:08
 */

use Zizaco\Entrust\EntrustRole;
use DavinBao\Workflow\HasNodeForRole;

class Role extends EntrustRole
{
    use HasNodeForRole;

}