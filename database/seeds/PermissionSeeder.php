<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //遍历当前所有的路由
        $all_routes = \Route::getRoutes()->get();
        foreach ($all_routes as $route) {
            //获取组
            $group = $route->getPrefix();
            $name = $route->getName();
            if (!$name) {
                continue;
            }
            $exist_permission = Permission::where([
                ['group', $group],
                ['name', $name]
            ])->first();
            if ($exist_permission) {
                //已经存在的权限不再保存
                continue;
            }
            Permission::create([
                'name' => $name,
                'group' => $group,
                'display_name' => $name,
                'display_group' => $group
            ]);
        }
    }
}
