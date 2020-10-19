<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('package_id');
            $table->string('title');
            $table->double('price')->default(0);
            $table->double('duration')->default(1);
            $table->string('package_image')->nullable();
            $table->string('location')->nullable();
            $table->text('details')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->boolean('publish_status')->default(true);
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
        Schema::dropIfExists('packages');
    }
}
