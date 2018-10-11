<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReadyBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ready_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('req_date')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('total_budget');
            $table->string('no_of_guests');
            $table->string('no_of_adults')->nullable();
            $table->string('no_of_child')->nullable();
            $table->string('departure_port')->nullable();
            $table->string('itinerary')->nullable();
            $table->string('prev_book')->nullable();
            $table->string('boat_pref')->nullable();
            $table->string('ad_notes')->nullable();
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
        Schema::dropIfExists('ready_bookings');
    }
}
