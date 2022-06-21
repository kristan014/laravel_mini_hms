<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no');
            $table->string('room_charge');
            $table->timestamp('payment_date')->useCurrent();
            $table->string('payment_mode');
            $table->string('credit_card_no');

            $table->foreignId('bookings_id')->constrained()->unique();
            $table->foreignId('guest_id')->constrained()->unique();

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
        Schema::dropIfExists('bills');
    }
}
