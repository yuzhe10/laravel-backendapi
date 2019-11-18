<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->comment('菜单名称');
            $table->integer('parent_id')->unsigned()->default(0)->comment('父级id（值=0时，为一级分类）');
            $table->integer('level')->unsigned()->default(0)->comment('菜单级别');
            $table->string('menu_url')->nullable()->comment('菜单地址');
            $table->string('menu_image')->nullable()->comment('菜单图片地址');
            $table->integer('sort_num')->unsigned()->default(0)->comment('排序编号');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
