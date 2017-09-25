<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id')->comment('ID主键');
            $table->string('username', 50)->comment('管理员账号');
            $table->string('pwd')->comment('密码');
            $table->text('power')->nullable()->comment('权限');
            $table->tinyInteger('role_id')->nullable()->comment('(外键)角色id');
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
