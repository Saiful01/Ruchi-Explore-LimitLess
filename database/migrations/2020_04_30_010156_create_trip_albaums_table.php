<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripAlbaumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_albaums', function (Blueprint $table) {
            $table->increments('trip_album_id');
            $table->string('trip_album_title')->nullable();
            $table->text('trip_album_details')->nullable();
            $table->string('trip_album_image')->nullable();
            $table->boolean('is_beauty_gram')->default(false);
            $table->integer('season_type')->default(0);
            $table->unsignedBigInteger('author_id');


            $table->foreign('author_id')->references('id')->on('users');
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
        Schema::dropIfExists('trip_albaums');
    }
}
