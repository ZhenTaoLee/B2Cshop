<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTypeTable extends Migration
{
    /**
     * @author 张健领
     * Run the migrations.
     * 商品分类shop_type
     * @return void
     */
    public function up()
    {
        Schema::create('shop_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',  32)->unique();
            $table->integer('pid')->default(0);
            $table->string('path',  255);

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
        Schema::dropIfExists('shop_type');
    }
}
