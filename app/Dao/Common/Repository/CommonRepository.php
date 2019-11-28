<?php
/**
 * Project: backend.
 * User: http://Yuzhe.Wang
 * Date: 2019/11/9
 * Time: 2:01 PM
 */

namespace App\Dao\Common\Repository;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CommonRepository {

    public function create(array $attributes);

    public function delete(int $id) : bool ;

    public function update(array $attributes) : bool;

    public function find(int $id);

    public function paginate(int $pageSize) : LengthAwarePaginator;
}
