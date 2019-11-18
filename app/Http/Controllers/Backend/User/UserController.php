<?php
/**
 * Project: backend.
 * User: http://Yuzhe.Wang
 * Date: 2019/11/9
 * Time: 4:33 PM
 */

namespace App\Http\Controllers\Backend\User;


use App\Dao\User\Repository\UserRepository;
use Illuminate\Http\Request;

class UserController {
    private $userRepos;

    public function __construct(UserRepository $userRepository) {
        $this->userRepos = $userRepository;
    }

    public function register(Request $request) {
        $user = $this->userRepos->create($request->all());
        return response()->json($user);
    }

    public function find(Request $request) {
        $user = $this->userRepos->getOne(1);
        return responder()->success($user)->respond();
    }
}
