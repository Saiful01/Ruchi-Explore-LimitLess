<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_spots', function (Blueprint $table) {
            $table->increments('spot_id');
            $table->unsignedInteger('spot_category_id');
            $table->string('spot_name');
            $table->string('spot_bn_name')->nullable();
            $table->text('spot_details')->nullable();
            $table->text('featured_image');
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lon', 10, 7)->nullable();
            $table->string('address')->nullable();
            $table->boolean('is_active');

            $table->foreign('spot_category_id')->references('spot_category_id')->on('tourist_spot_categories');
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
        Schema::dropIfExists('tourist_spots');
    }
}
