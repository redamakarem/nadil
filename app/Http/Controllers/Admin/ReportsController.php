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
        ->take(3)->get();
        $top_weekday_nums= DB::table('bookings')
        ->select('weekday', DB::raw('count(*) as count'))
        ->orderby('count','desc')
        ->groupBy('weekday')
        ->take(3)->get();
        // dd($top_weekday_nums);
        $top_weekdays = array();
       foreach ($top_weekday_nums as  $top_weekday_num) {
        array_push($top_weekdays,$this->getDayNameFromDayOfWeek($top_weekday_num->weekday));
       }
        $top_booked=Restaurant::withCount('bookings')->orderBy('bookings_count','desc')->take(3)->get();
        
        return view('admin.reports.index',compact(['top_time','top_booked','top_weekdays']));
    }
}
