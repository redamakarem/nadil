<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\MealType;
use App\Models\Restaurant;
use App\Models\Schedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

class SiteController extends Controller
{
    public function index()
    {
        $agent = new Agent();
//        dd($agent->isMobile());
        $restaurants = Restaurant::all();
        $cuisines = Cuisine::all();
        $meal_types = MealType::with('restaurants')->get();
        if ($agent->isMobile()) {
            return view('site.mobile.home', ['restaurants' => $restaurants,
                'cuisines' => $cuisines]);
        }


        return view('site.home', ['restaurants' => $restaurants,
                                        'cuisines' => $cuisines,
                                        'meal_types' => $meal_types,
            ]);
    }

    public function show_restaurant($restaurant_id)
    {

        $current_time = Carbon::now();
        $time_str = $current_time->toTimeString();


        $agent = new Agent();
        $restaurant = Restaurant::with('menus')->findOrFail($restaurant_id);
        if ($agent->isMobile()) {
            return view('site.mobile.restaurant-menu', compact('restaurant'));

        } else {
            return view('site.restaurant-menu', compact('restaurant'));
        }

    }

    public function book_restaurant($restaurant_id)
    {
        $agent = new Agent();
        $restaurant = Restaurant::with('schedules')->findOrFail($restaurant_id);

        $schedule = $restaurant->schedules->filter(function ($item) {
            if (Carbon::now()->between($item->from_date, $item->to_date)) {
                return $item;
            }
        })->first();
        if ($schedule) {
            $slots = $this->getTimeSlots($schedule->from_time, "{$schedule->slot_length} minutes", $schedule->to_time);
        } else {
            $slots = [];
        }
        if ($agent->isMobile()) {
            return view('site.mobile.restaurant-booking', compact('restaurant'));
        } else {
            return view('site.restaurant-booking', compact('restaurant'));
        }

    }

    public function getTimeSlots($start_time, $end_time, $slot_length)
    {
        $period = CarbonPeriod::create($start_time, $slot_length, $end_time);
        $slots = [];
        foreach ($period as $item) {
            array_push($slots, $item->format("h:i A"));
        }

        return $slots;
    }

    public function restaurants()
    {

    }


    public function userRegister()
    {

        return view('site.user-register');

    }

    public function contact()
    {
        return view('site.contact');
    }

    public function profile()
    {
        $profile = Auth::user()->profile->firstOrFail();
        return view('site.user.profile', compact('profile'));
    }
}
