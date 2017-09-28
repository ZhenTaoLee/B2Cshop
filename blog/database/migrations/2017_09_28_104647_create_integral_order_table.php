<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegralOrderTable extends Migration
{
    /**
     * @author 吴国庆
     * Run the migrations.
     * 创建积分商品订单表
     * @return void
     */
    public function up()
    {
        Schema::create('integral_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('integral_goods_id')->comment('积分商品id');
            $table->tinyInteger('order_number')->comment('随机订单号');
            $table->tinyInteger('generation_time')->comment('生成时间');
            $table->tinyInteger('number')->comment('数量');
            $table->string('consignee', 50)->comment('收货人');
            $table->tinyInteger('phone')->comment('收货人电话');
            $table->string('address', 50)->comment('收货地址');
            $table->tinyInteger('integral_price')->comment('总积分');
            $table->tinyInteger('order_status')->comment('0:新订单；1:已发货；2:已收货；3:无效订单');

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
        Schema::dropIfExists('integral_order');
    }
}
