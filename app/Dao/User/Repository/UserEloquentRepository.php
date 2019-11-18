<?php
/**
 * Project: backend.
 * User: http://Yuzhe.Wang
 * Date: 2019/11/9
 * Time: 3:32 PM
 */

namespace App\Dao\User\Repository;

use App\Dao\User\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserEloquentRepository implements UserRepository {
    private $user;
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getOne(int $id) {
        return $this->user::find($id);
    }

    public function create(array $attributes) : User {
        return $this->user::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => Hash::make($attributes['password']),
            'api_token' => Str::random(80),
            'remember_token' => Str::random(10),
        ]);
    }
}
