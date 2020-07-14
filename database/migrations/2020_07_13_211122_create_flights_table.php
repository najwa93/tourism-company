<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('economy_seats_count');
            $table->integer('first_class_seats_count');
            $table->float('economy_ticket_price');
            $table->float('first_class_ticket_price');
            $table->string('flight_duration');
            $table->string('date');
            $table->string('time');

            $table->integer('source_city_id')->unsigned()->nullable();
            $table->foreign('source_city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('destination_city_id')->unsigned()->nullable();
            $table->foreign('destination_city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('flight_company_id')->unsigned()->nullable();
            $table->foreign('flight_company_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('flights');
    }
}
