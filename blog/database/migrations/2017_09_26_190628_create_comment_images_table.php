<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentImagesTable extends Migration
{
    /**
     * 商品品论图片表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id');
            $table->string('image', 255);

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
        Schema::dropIfExists('comment_images');
    }
}
