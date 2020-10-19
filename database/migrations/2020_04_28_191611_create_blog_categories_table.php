<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->increments('blog_category_id');
            $table->string('en_name'); //English name
            $table->string('bn_name')->nullable();
            $table->longText('category_details')->nullable();
            $table->text('featured_image')->nullable();
            $table->unsignedInteger('home_nav_id')->default(0);
            $table->boolean('is_for_admin')->default(true);
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
        Schema::dropIfExists('blog_categories');
    }
}
