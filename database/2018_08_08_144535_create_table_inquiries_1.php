<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInquiries1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries_1', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_id');
            $table->string('our_notes')->nullable();
            $table->string('com_via')->nullable();
            $table->string('invite_boat')->nullable();
            $table->string('shared_with')->nullable();
            $table->string('boat_2')->nullable();
            $table->string('boat_3')->nullable();
            $table->string('boat_4')->nullable();
            $table->string('winner')->nullable();
            $table->string('total_hours')->nullable();
            $table->string('total_commission')->nullable();
            $table->string('commission_rate')->nullable();
            $table->string('total_earned')->nullable();
            $table->dateTime('date_paid')->nullable();
            $table->dateTime('date_booked')->nullable();
            $table->string('update_calender')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('inquiries_1');
    }
}
