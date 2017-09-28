<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopPicTable extends Migration
{
	/**
	 * @author 张健领
	 * Run the migrations.
	 * 商品图片表
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop_pic', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('gid');
			$table->string('pic');
			$table->string('name');


			//预留字段
	            	$table->string('field1', 50)->nullable();
	            	$table->string('field2', 50)->nullable();

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
		Schema::dropIfExists('shop_pic');
	}
}
