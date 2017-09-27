<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateErrorUserTable extends Migration
{
    /**
     * @author 张健领
     * Run the migrations.
     * 登录错误信息表error_user
     * @return void
     */
    public function up()
    {
        Schema::create('error_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->integer('error_number');
            $table->integer('error_time');

            //预留字段
            $table->string('field1', 50)->nullable();
            $table->string('field2', 50)->nullable();
            $table->string('field3', 50)->nullable();

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
        Schema::dropIfExists('error_user');
    }
}
