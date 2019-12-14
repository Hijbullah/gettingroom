<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('need_apartments', function (Blueprint $table) {
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
            $table->string('apartment_type')->nullable();
            $table->string('is_furnished')->default('no')->nullable();
            $table->text('amenities')->nullable();

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
        Schema::dropIfExists('need_apartments');
    }
}
