<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemainingAddressFieldsToRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->integer('block')->nullable();
            $table->string('street_en')->nullable();
            $table->string('street_ar')->nullable();
            $table->integer('building')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('flat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn([
                'block',
                'street_en',
                'street_ar',
                'building',
                'floor',
                'flat',
            ]);
        });
    }
}
