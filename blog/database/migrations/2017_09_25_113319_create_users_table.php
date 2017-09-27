<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * @author 张健领
     * Run the migrations.
     * 用户表user
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('user_level')->comment('1：普通用户，2：VIP用户，3：钻石用户')->nullable()->default(1);
            $table->string('name', 16)->unique();
            $table->char('pass', 32);
            $table->tinyInteger('sex')->comment('1:男，2：女,3:保密')->nullable()->default(3)->index();
            $table->float('total_intergral', 8, 2)->nullable()->default(0);
            $table->float('surplus_intergral', 8, 2)->nullable()->default(0);
            $table->string('phone', 11);
            $table->string('email', 50);
            $table->tinyInteger('state')->comment('1：启用，2：禁用 ')->nullable()->default(1);
            $table->string('session_id')->nullable();
            $table->string('addtime');


             //预留字段
            $table->string('field1', 50)->nullable();
            $table->string('field2', 50)->nullable();
            $table->string('field3', 50)->nullable();

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
        Schema::dropIfExists('users');
    }
}
