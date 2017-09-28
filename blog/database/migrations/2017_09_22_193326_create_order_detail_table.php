<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
	/**
	 * @author 张健领
	 * Run the migrations.
	 * 订单详情表
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_detail', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('oid')->comment('商品ID');
			$table->integer('gid')->comment('订单id');
			$table->integer('unit_price')->comment('商品单价');
			$table->integer('product_num')->comment('商品数量');
			$table->integer('single_intergral')->comment('单件积分');
			$table->tinyInteger('order_state')->default(0)->comment('订单状态：0进行中，1已完成，2已取消');
			$table->tinyInteger('pay_state')->default(0)->comment('付款状态：0待付款，1已付款，2已退款');
			$table->string('goods_name')->comment('商品名');
			$table->string('goods_pic')->comment('商品图');
			$table->string('goods_specification')->comment(' 商品规格（各种商品的各种特定规格尺寸）');


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
		Schema::dropIfExists('order_detail');
	}
}
