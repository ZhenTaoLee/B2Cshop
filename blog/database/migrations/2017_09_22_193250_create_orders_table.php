<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
	/**
	 * @author 张健领
	 * Run the migrations.
	 * 订单表
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('order_number')->comment('订单号');
			$table->integer('order_time')->comment('订单生成时间');
			$table->integer('uid')->comment('用户id');
			$table->integer('aid')->comment('地址表id');
			$table->string('telephone', 11)->comment('收货电话');
			$table->string('linkman', 11)->comment('收货人');
			$table->string('adderssname')->comment('收货地址');
			$table->float('total_money', 8 , 2)->comment('总金额');
			$table->float('credits', 8, 2)->comment('总积分');
			$table->integer('pay_time')->comment('支付时间');
			$table->tinyInteger('pay_state')->default(0)->comment('付款状态：0待付款，1已付款，2已退款');
			$table->tinyInteger('order_state')->default(0)->comment('订单状态：0进行中，1已完成，2已取消');
			$table->tinyInteger('logistics')->default(0)->comment('物流状态：0未发出，1待揽收，2已发出');


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
		Schema::dropIfExists('orders');
	}
}
