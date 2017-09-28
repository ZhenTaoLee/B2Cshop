<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopPriceTable extends Migration
{
	/**
	 * @author 张健领
	 * Run the migrations.
	 * 商品价格表
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop_price', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('gid');
			$table->float('price' , 8 , 2);
			$table->integer('store');
			$table->integer('sales');
			$table->string('memory');
			$table->string('color' , 50);
			$table->string('run_memory');


			//预留字段
	            	$table->string('field1', 50)->nullable();
	            	$table->string('field2', 50)->nullable();
	            	$table->string('field3', 50)->nullable();
	            	//系统字段
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
		Schema::dropIfExists('shop_price');
	}
}
