<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    private function getDayNameFromDayOfWeek($dayOfWeek)
    {
        $days =[
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ];
        return $days[$dayOfWeek];
    }

    public function index()
    {
        $top_time= DB::table('bookings')
        ->select('booking_time', DB::raw('count(*) as count'))
        ->orderby('count','desc')
        ->groupBy('booking_time')
        ->first();
        $top_weekday_num= DB::table('bookings')
        ->select('weekday', DB::raw('count(*) as count'))
        ->orderby('count','desc')
        ->groupBy('weekday')
        ->first()->weekday;
        $top_weekday = $this->getDayNameFromDayOfWeek($top_weekday_num);
        $top_booked=Restaurant::withCount('bookings')->orderBy('bookings_count','desc')->first();
        
        return view('admin.reports.index',compact(['top_time','top_booked','top_weekday']));
    }
}
