<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodCommentTable extends Migration
{
    /**
     * @author 吴国庆
     * 商品评论表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('order_detail_id');
            $table->string('comment', 255);
            $table->tinyInteger('date');

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
        Schema::dropIfExists('good_comment');
    }
}
