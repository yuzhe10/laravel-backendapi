<?php
/**
 * Project: backend.
 * User: http://Yuzhe.Wang
 * Date: 2019/11/28
 * Time: 4:38 PM
 */

namespace App\Dao\User;


class Role extends \Spatie\Permission\Models\Role {
    protected $guard_name = 'api';
}
