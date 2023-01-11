<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Cuisine;
use App\Models\MealType;
use App\Models\Restaurant;
use App\Models\Schedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

class SiteController extends Controller
{
    public function index()
    {
        if(session('target_route','') != ''){
            return redirect(route(session('target_route',''),session('booking_restaurant')));
        }
        $agent = new Agent();
        $restaurants = Restaurant::publishable()->get();
        $cuisines = Cuisine::all();
        $meal_types = MealType::with('restaurants')->get();
        if ($agent->isDesktop()) {
            return view('site.home', [
                'restaurants' => $restaurants,
                'cuisines' => $cuisines,
                'meal_types' => $meal_types,
            ]);
        }


        return view('site.mobile.home', [
            'restaurants' => $restaurants,
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
        if ($agent->isMobile()) {
            return view('site.mobile.restaurant-booking', compact('restaurant'));
        } else {
            return view('site.restaurant-booking', compact('restaurant'));
        }
    }

    public function check_booking(Request $request)
    {
        
        $validated_data = $request->validate(
            [
                'search_date' => ['required'],
                'search_time' => ['required'],
                'search_seats' => ['required'],
                // 'search_name' => ['required']
             ]
        );
        // dd($validated_data);
        $result = Restaurant::all()->filter(function ($value, $key) use($validated_data) {
            return $value->getAvailableSeats($validated_data['search_date'],$validated_data['search_time']) > $validated_data['search_seats'];
        });

        return view('site.search',compact('result'));
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

    public function restaurants_by_cuisine($cuisine)
    {
        $restaurants = Cuisine::findOrFail($cuisine)->restaurants;
        return view('site.restaurants-by-cuisine',compact(['restaurants']));
    }

    public function about()
    {
        return view('site.about');
    }

    public function show_booking_confirmation($booking_id)
    {
        $agent = new Agent();
        $booking = Booking::findOrFail($booking_id);
        if ($agent->isDesktop()) {
            return view('site.booking-thanks', compact('booking'));
        } else {
            return view('site.mobile.booking-thanks', compact('booking'));
        }
        
    }
}
