<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * @author 李咏衡
     * Run the migrations.
     * 管理员列表
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id')->comment('ID主键');
            $table->string('username', 50)->comment('管理员账号');
            $table->string('pwd')->comment('密码');
            $table->text('power')->nullable()->comment('权限');
            $table->string('email')->comment('邮箱');
            $table->tinyInteger('role_id')->default(0)->comment('(外键)角色id');
            $table->integer('addtime')->comment('加入时间');

            //laravel默认
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
        Schema::dropIfExists('admin');
    }
}
