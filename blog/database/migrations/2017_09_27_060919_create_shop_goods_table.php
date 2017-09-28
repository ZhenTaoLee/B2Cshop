<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopGoodsTable extends Migration
{
	/**
	 * @author 张健领
	 * Run the migrations.
	 * 商品信息表
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop_goods', function (Blueprint $table) {
			$table->increments('id');
			$table->string('gname',  32);
			$table->integer('sales')->default(0);
			$table->integer('clicknum')->default(0);
			$table->integer('store');
			$table->integer('typeid');
			$table->string('company', 50);
			$table->integer('time_shelf');
			$table->integer('time_list');
			$table->tinyInteger('status')->default(1)->comment('1：新上架、2：在售、3：下架');
			$table->string('pic');

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
		Schema::dropIfExists('shop_goods');
	}
}
