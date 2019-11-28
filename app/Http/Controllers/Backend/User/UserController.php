<?php
/**
 * Project: backend.
 * User: http://Yuzhe.Wang
 * Date: 2019/11/9
 * Time: 4:33 PM
 */

namespace App\Http\Controllers\Backend\User;


use App\Dao\User\Repository\UserRepository;
use App\Http\Controllers\Backend\Common\CommonController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class UserController extends CommonController {
    use AuthenticatesUsers;

    public function __construct(UserRepository $userRepository) {
        $this->setRepos($userRepository);
    }

    public function username() {
        return 'name';
    }

    /**
     * Override login success  response
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendLoginResponse(Request $request){
        $this->clearLoginAttempts($request);
        return responder()->success($this->guard()->user())->respond();
    }

    /**
     * Override failed login response for  AuthenticatesUsers trait
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendFailedLoginResponse(Request $request){
        return  responder()->error(422,'User name or Password is invalid.')->respond();
    }

    /**
     * Override failed logout processing for AuthenticatesUsers trait
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request){
        if($this->getRepos()->logout()) {
            return responder()->success()->respond();
        }
        return responder()->error()->respond();
    }

    /**
     * Get the current user info
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function info(Request $request) {
        return responder()->success(Auth::user())->respond();
    }

    public function edit(Request $request)  {
        $request->validate([
            'id' => 'required|numeric',
            $this->username() => 'required|string',
        ]);
        return $this->baseEdit($request->all());
    }

    public function create(Request $request) {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);
        return $this->baseCreate($request->all());
    }

    public function delete(Request  $request) {
        $request->validate([
            'id' =>  'required|numeric'
        ]);
        return $this->baseDelete($request->get('id'));
    }

    public function getRepos() : UserRepository {
        return $this->repos;
    }
}
