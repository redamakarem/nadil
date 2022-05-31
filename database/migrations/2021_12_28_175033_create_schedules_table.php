<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('slot_length');
            $table->integer('slot_capacity');
            $table->date('from_date');
            $table->date('to_date');
            $table->time('from_time');
            $table->time('to_time');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('schedules');
    }
}
