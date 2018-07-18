<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no')->index();
            $table->integer('room_type_id')->unsigned()->index();
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
            $table->integer('price');
            $table->float('discount')->default(10);
            $table->string('image')->default('img/rooms/default.png');
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
        Schema::drop('rooms');
    }
}
