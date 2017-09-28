<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTextTable extends Migration
{
	/**
	 * @author 张健领
	 * Run the migrations.
	 * 商品描述表
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop_text', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('gid');
			$table->string('text');
			$table->string('attribute');


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
		Schema::dropIfExists('shop_text');
	}
}
