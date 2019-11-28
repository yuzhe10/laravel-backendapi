<?php
/**
 * Project: backend.
 * User: http://Yuzhe.Wang
 * Date: 2019/11/28
 * Time: 11:26 AM
 */

namespace App\Http\Controllers\Backend\Common;


use App\Dao\Common\Repository\CommonRepository;
use Illuminate\Http\Request;

abstract class CommonController {
    protected $repos;

    public abstract function getRepos();

    public function setRepos(CommonRepository $repository = null) {
        $this->repos = $repository;
    }

    /**
     * Get entity list with pagination
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginate(Request $request) {
        $request->validate([
            'limit' => 'required|numeric'
        ]);
        return responder()->success(
            $this->getRepos()->paginate($request->get('limit'))
        )->respond();
    }

    /**
     * Update entity by repos and response
     * @param array $attributes
     * @return \Illuminate\Http\JsonResponse
     */
    public function baseEdit(array $attributes) {
        if ($this->getRepos()->update($attributes)) {
            return responder()->success()->respond();
        }
        return responder()->error()->respond();
    }

    /**
     * Create entity by repos and response[
     * @param array $attributes
     * @return \Illuminate\Http\JsonResponse
     */
    public function baseCreate(array $attributes) {
        return responder()->success($this->getRepos()->create($attributes))->respond();
    }

    /**
     * Delete entity by repos and response
     * @param array $attributes
     * @return \Illuminate\Http\JsonResponse
     */
    public function baseDelete(int $id) {
        if ($this->getRepos()->delete($id)) {
            return  responder()->success()->respond();
        }
        return responder()->error()->respond();
    }
}
