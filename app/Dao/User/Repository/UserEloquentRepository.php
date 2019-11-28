<?php
/**
 * Project: backend.
 * User: http://Yuzhe.Wang
 * Date: 2019/11/9
 * Time: 3:32 PM
 */

namespace App\Dao\User\Repository;

use App\Dao\Common\Traits\RepositoryTrait;
use App\Dao\User\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserEloquentRepository implements UserRepository {
    use RepositoryTrait;

    public function __construct(User $user) {
        $this->model = $user;
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

    public function logout(): bool {
        // refresh  token process
        $user = Auth::user();
        $user->api_token = User::generateApiToken();
        return $user->save();
    }
}
