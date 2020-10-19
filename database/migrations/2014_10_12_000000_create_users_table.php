<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('user_login')->unique();
            $table->string('phone')->nullable();
            $table->string('user_pass')->nullable();
            $table->string('old_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_url')->nullable();
            $table->string('address')->nullable();
            $table->string('user_activation_key')->nullable();
            $table->boolean('user_status')->default(true);
            $table->string('display_name')->nullable();
            $table->string('profile_pic')->nullable();

            $table->string('user_registered')->nullable();
            $table->boolean('is_social_login')->default(false);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_admin')->default(false);//Admin=1, UserId=2
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
