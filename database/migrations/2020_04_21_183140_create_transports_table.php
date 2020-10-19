<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->increments('transport_id');
            $table->unsignedInteger('from_id');//From ID
            $table->unsignedInteger('transport_type');//Bus/Train/Air
            $table->double('regular_price')->nullable();//Bus Non AC/Train Regular/Air Regular
            $table->double('luxury_price')->nullable();
            $table->unsignedBigInteger('place_id');
            $table->timestamps();

            $table->foreign('place_id')->references('place_id')->on('places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transports');
    }
}
