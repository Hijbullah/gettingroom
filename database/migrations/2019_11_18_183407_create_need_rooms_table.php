<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('need_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('listing_id')->unique();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');

            $table->string('title')->nullable();

            $table->string('location');
            $table->string('lat');
            $table->string('lng');

            $table->decimal('monthly_rent');
            $table->string('rental_currency');

            $table->boolean('is_short_term')->default(0);
            $table->date('move_date');
            $table->date('leave_date')->nullable();

            $table->text('description')->nullable();

            $table->string('cleanliness')->nullable();
            $table->string('overnight_guest')->nullable();
            $table->string('party_habit')->nullable();
            $table->string('get_up')->nullable();
            $table->string('go_to_bed')->nullable();
            $table->string('food_preference')->nullable();
            $table->string('smoker')->nullable();
            $table->string('work_schedule')->nullable();
            $table->string('occupation')->nullable();

            $table->string('prefer_age')->nullable();
            $table->string('prefer_smoker')->nullable();
            $table->string('prefer_student')->default('no')->nullable();

            $table->text('my_pet')->nullable();
            $table->text('prefer_pet')->nullable();


            $table->boolean('status')->default(1)->nullable();
            
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
        Schema::dropIfExists('need_rooms');
    }
}
