<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultilingualSupportToCatalogueCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalogue_categories', function (Blueprint $table) {
            $table->renameColumn('name','name_en');
            $table->string('name_ar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catalogue_categories', function (Blueprint $table) {
            $table->renameColumn('name_en','name');
            $table->dropColumn('name_ar');
        });
    }
}
