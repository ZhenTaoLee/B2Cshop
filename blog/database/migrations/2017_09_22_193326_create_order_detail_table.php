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
			$table->string('orderid', 32);
			$table->integer('uid');
			$table->integer('gid');
			$table->string('gname', 50);
			$table->string('type', 60);
			$table->integer('num');
			$table->integer('price');
			$table->string('address', 50);
			$table->string('status');


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
