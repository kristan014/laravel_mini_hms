<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('room_no');
            $table->string('image');
            $table->string('is_occupied');
            $table->foreignId('room_type_id')->constrained();
            $table->foreignId('hotel_id')->constrained();
            $table->string('status')->default('Active');
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
        Schema::dropIfExists('rooms');
    }
}
