<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->text('product_details')->nullable();
            $table->text('product_image')->nullable();
            $table->string('available_in')->nullable();
            $table->string('url_link');
            $table->string('Product_price');
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id')->references('product_category_id')->on('product_categories');
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
        Schema::dropIfExists('products');
    }
}
