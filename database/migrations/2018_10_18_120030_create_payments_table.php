<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_id')->nullable();
            $table->integer('winner')->nullable();
            $table->string('date_booked')->nullable();
            $table->integer('total_hour')->nullable();
            $table->string('base_rate')->nullable();
            $table->string('fuel')->nullable();
            $table->string('gratuity')->nullable();
            $table->string('apa')->nullable();
            $table->string('total_com')->nullable();
            $table->string('com_rate')->nullable();
            $table->string('total_earn')->nullable();
            $table->string('date_paid')->nullable();
            $table->string('paid_via')->nullable();
            $table->string('com_via')->nullable();
            $table->string('auto_up')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
