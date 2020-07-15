<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customers_count');
            $table->float('price');
            $table->string('offer_duration');
            $table->string('phone_number');
            $table->string('details');
            $table->boolean('status');

            $table->integer('hotel_id')->unsigned()->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');

            $table->integer('source_city_id')->unsigned()->nullable();
            $table->foreign('source_city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('source_country_id')->unsigned()->nullable();
            $table->foreign('source_country_id')->references('id')->on('countries')->onDelete('cascade');

            $table->integer('destination_city_id')->unsigned()->nullable();
            $table->foreign('destination_city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('destination_country_id')->unsigned()->nullable();
            $table->foreign('destination_country_id')->references('id')->on('countries')->onDelete('cascade');

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
        Schema::dropIfExists('offers');
    }
}
