<?php
/**
 * Project: backend.
 * User: http://Yuzhe.Wang
 * Date: 2019/11/10
 * Time: 3:04 AM
 */

namespace App\Dao;


use App\Dao\User\Repository\UserEloquentRepository;
use App\Dao\User\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(UserRepository::class,UserEloquentRepository::class);
    }
}
