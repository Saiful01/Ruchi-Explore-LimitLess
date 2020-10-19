<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GameScore extends Migration
{
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('score_id');
            $table->unsignedBigInteger('gamer_id');
            $table->integer('mark');
            $table->integer('time');
            $table->double('score')->nullable();
            $table->integer('game_id')->default(1);
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
        Schema::dropIfExists('scores');
    }
}
