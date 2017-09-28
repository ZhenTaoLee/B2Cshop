<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
	/**
	 * @author 张健领
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('uid')->comment('用户id');
			$table->string('linkman')->comment('收件人');
			$table->string('telephone')->comment('联系电话');
			$table->string('province')->comment('省份');
			$table->string('city')->comment('市/区');
			$table->string('town')->comment('镇/街道办');
			$table->string('dec')->comment('详细地址');

			//预留字段
	            	$table->string('field1', 50)->nullable();
	            	$table->string('field2', 50)->nullable();

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
		Schema::dropIfExists('adderss');
	}
}
