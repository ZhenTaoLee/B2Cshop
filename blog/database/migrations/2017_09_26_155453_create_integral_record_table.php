<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegralRecordTable extends Migration
{
    /**
     * 积分记录表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_record', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_detail_id');
            $table->integer('user_id');
            $table->string('detail', 255);
            $table->char('change', 11);
            $table->tinyInteger('date');

            $table->string('field1', 50);
            $table->string('field2', 50);
            $table->string('field3', 50);
            
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
        Schema::dropIfExists('integral_record');
    }
}
