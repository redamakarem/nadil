<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookingStatusToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_status_id')->default(1);
            $table->foreign('booking_status_id')->references('id')->on('booking_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('booking_status_id');
            $table->dropColumn('booking_status_id');
        });
    }
}
