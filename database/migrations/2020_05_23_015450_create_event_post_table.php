<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_posts', function (Blueprint $table) {
            $table->increments('event_post_id');
            $table->string('event_post_title_en');
            $table->string('event_post_title_bn');
            $table->text('event_post_description')->nullable();
            $table->text('event_post_image')->nullable();
            $table->string('event_post_youtube_links')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('event_id');
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
        Schema::dropIfExists('event_post');
    }
}
