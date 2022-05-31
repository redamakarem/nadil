<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealTypeRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_type_restaurant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meal_type_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('meal_type_id')->references('id')->on('meal_types');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
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
        Schema::dropIfExists('meal_type_restaurant');
    }
}
