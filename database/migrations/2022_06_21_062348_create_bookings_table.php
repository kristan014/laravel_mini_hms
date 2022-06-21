<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('status')->default('Active');
            $table->foreignId('guest_id')->constrained()->unique();
            $table->foreignId('room_id')->constrained();
            $table->timestamp('booking_date')->useCurrent();
            $table->integer('no_of_adults');
            $table->integer('no_of_kids');
            $table->dateTime('arrival_date')->nullable();
            $table->dateTime('departure_date')->nullable();



            $table->softDeletes();
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
        Schema::dropIfExists('bookings');
    }
}
