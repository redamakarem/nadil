<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogueCategoriesDishesRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalogue_categories_dishes', function (Blueprint $table) {
            $table->foreign('catalogue_category_id')->references('id')->on('catalogue_categories')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('dish_id')->references('id')->on('dishes')
                ->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogue_categories_dishes');
    }
}
