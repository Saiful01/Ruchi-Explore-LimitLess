<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *1,25,47,2
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('blog_id');
            $table->string('blog_title');
            $table->longText('blog_details');
            $table->unsignedBigInteger('author_id');
            $table->string('featured_image')->nullable();
            $table->boolean('publish_status')->default(true);
            $table->boolean('comment_enable')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_beauty_gram')->default(false);
            $table->string('category_id');
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
        Schema::dropIfExists('blogs');
    }
}
