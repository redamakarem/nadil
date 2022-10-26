<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $booking_statuses = [
            [
                'name_en' =>'Booked',
                'name_ar' =>'تم الحجز',
            ],
            [
                'name_en' =>'Expected',
                'name_ar' =>'المتوقع',
            ],
            [
                'name_en' =>'Arrived',
                'name_ar' =>'حضر',
            ],
            [
                'name_en' =>'No Show',
                'name_ar' =>'لم يحضر',
            ],
            [
                'name_en' =>'Cancelled',
                'name_ar' =>'تم الالغاء',
            ],
        ];
        BookingStatus::insert($booking_statuses);
    }
}
