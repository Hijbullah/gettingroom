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
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            
            $table->boolean('phone_verified')->default(0);
            $table->boolean('email_verified')->default(0);
            $table->boolean('facebook_verified')->default(0);
            $table->boolean('google_verified')->default(0);
            $table->boolean('instagram_verified')->default(0);
            $table->boolean('twitter_verified')->default(0);
            $table->boolean('linkedin_verified')->default(0);
            $table->boolean('package')->default(0);

            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('place')->nullable();
            $table->string('language')->nullable();
            $table->text('about')->nullable();
            
            $table->string('active_status')->default(1);
            
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
