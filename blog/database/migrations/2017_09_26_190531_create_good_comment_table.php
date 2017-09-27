<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodCommentTable extends Migration
{
    /**
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

            $table->string('field1', 50);
            $table->string('field2', 50);
            $table->string('field3', 50);

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
