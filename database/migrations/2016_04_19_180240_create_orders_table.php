<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_no');
            $table->foreign('room_no')->references('no')->on('rooms')->onDelete('cascade');
            $table->string('phone', 11);
            $table->string('name', 18);
            $table->timestamp('check_in_at');
            $table->timestamp('check_out_at');
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
        Schema::drop('orders');
    }
}
