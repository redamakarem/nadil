<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCuisineAndCategoryToDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->unsignedBigInteger('cuisine_id')->nullable();
//            $table->unsignedBigInteger('catalogue_category_id')->nullable();
            $table->foreign('cuisine_id')->references('id')->on('cuisines')
                ->nullOnDelete()->cascadeOnUpdate();
//            $table->foreign('catalogue_category_id')
//                ->references('id')->on('catalogue_categories')
//                ->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropForeign('dishes_cuisine_id_foreign');
            $table->dropColumn('cuisine_id');
            $table->dropForeign('dishes_catalogue_category_id_foreign');
            $table->dropColumn('catalogue_category_id');
        });
    }
}
