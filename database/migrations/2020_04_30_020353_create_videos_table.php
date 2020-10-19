<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('video_id');
            $table->string('video_title')->nullable();
            $table->text('video_details')->nullable();
            $table->string('youtube_links')->nullable();
            $table->string('video')->nullable();
            $table->string('video_image')->nullable();
            $table->boolean('is_beauty_gram')->default(false);
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
        Schema::dropIfExists('videos');
    }
}
