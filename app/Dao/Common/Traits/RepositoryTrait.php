<?php
/**
 * Project: backend.
 * User: http://Yuzhe.Wang
 * Date: 2019/11/28
 * Time: 2:36 PM
 */

namespace App\Dao\Common\Traits;


use App\Exceptions\CreateException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

trait RepositoryTrait {
    private $model;

    public function create(array $attributes) {
        $model = $this->model::create($attributes);
        if (!$model->wasRecentlyCreated) {
            throw new CreateException('创建数据失败');
        }
        return $model;
    }

    public function delete(int $id): bool {
        $model = $this->model::find($id);
        return $model ? $model->delete() : false;
    }

    public function update(array $attributes): bool {
//        return $this->model::updateOrInsert($attributes['id'],$attributes);
        return $this->model::where('id',$attributes['id'])->update($attributes);
    }

    public function find(int $id) {
        return $this->model::find($id);
    }

    public function paginate(int $pageSize): LengthAwarePaginator {
        return $this->model::paginate($pageSize);
    }
}
