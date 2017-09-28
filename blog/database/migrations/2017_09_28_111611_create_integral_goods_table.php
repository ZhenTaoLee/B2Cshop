<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegralGoodsTable extends Migration
{
    /**
     * @author 吴国庆
     * Run the migrations.
     * 创建积分商品表
     * @return void
     */
    public function up()
    {
        Schema::create('integral_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 16)->unique()->comment('商品名');
            $table->string('image', 255)->comment('商品图片');
            $table->string('detail', 255)->comment('商品详情');
            $table->tinyInteger('integral_price')->comment('积分价格');
            $table->tinyInteger('date_issued')->comment('上架时间');
            $table->tinyInteger('date_under')->comment('下架时间');

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
        Schema::dropIfExists('integral_goods');
    }
}
