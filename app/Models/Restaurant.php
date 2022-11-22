<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Dish;
use Carbon\CarbonPeriod;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = [
        'name_en',
        'name_ar',
        'email',
        'address',
        'coordinates',
        'area',
        'block',
        'street_en',
        'street_ar',
        'building',
        'floor',
        'image',
        'phone',
        'user_id',
        'is_active',
        'estimated_dining_time',
        'facebook',
        'instagram',
        'accessible',
        'private_rooms',
        'opening_hours'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function staff()
    {
        return $this->hasMany(User::class);
    }

    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class);
    }

    public function menus()
    {
        return $this->hasMany(DishesMenu::class, 'restaurant_id', 'id');
    }

    public function areaa()
    {
        return $this->belongsTo(Area::class, 'area', 'id');
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'restaurant_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function diningTables()
    {
        return $this->hasMany(DiningTable::class);
    }


    public function reserved_tables()
    {
        return $this->hasMany(BookingsTables::class);
    }

    public function meal_types()
    {
        return $this->belongsToMany(MealType::class);
    }


    public function getTimeSlots($start_time, $end_time, $slot_length)
    {
        $period = CarbonPeriod::create($start_time, $slot_length, $end_time);
        $slots = [];
        foreach ($period as $item) {
            if (Carbon::parse($end_time)->format("h:i A") != $item->format("h:i A"))
                array_push($slots, $item->format("h:i A"));
        }


        return $slots;
    }

    public function getSlotsForSchedules($selected_date)
    {
        $slots = [];
        $schedule = $this->schedules->filter(function ($item) use ($selected_date, $slots) {
            $sDate = Carbon::parse($selected_date);
            if ($sDate->between($item->from_date, $item->to_date)) {
                return $item;
            }
        })->first();
        if ($schedule) {
            $slots = $this->getTimeSlots($schedule->from_time, "{$this->estimated_dining_time} minutes", $schedule->to_time);
        } else {
            $slots = [];
        }
        return $slots;
    }

    public function getAvailableTables($date, $time)
    {
        $reserved_tables = BookingsTables::where('booking_date', $date)
            // ->where(function ($query) use ($time) {
            //     $query->where('booking_time', '<=', $time);
            //     $query->where('booking_end_time', '>=', $time);
            // }
            // )
            ->where('restaurant_id',$this->id)
            ->whereIn('booking_time',$this->getIntersectingTimes($date,$time))
            ->pluck('table_id');
        return $this->diningTables->whereNotIn('id', $reserved_tables);
    }

    public function getAvailableSeats($date, $time_slot)
    {
        $input_date = Carbon::parse($date)->format('Y-m-d');
        $input_time =  Carbon::parse($time_slot)->format('H:i:s');
        if (count($this->getAvailableTables($input_date, $input_time))) {
            return $this->getAvailableTables($input_date, $input_time)->sum('capacity');
        } else {
            return 0;
        }
    }

    public function getIntersectingTimes($date,$time)
    {

        $search_time_up = Carbon::parse($time);
        $search_time_down = Carbon::parse($time);
        $search_time_carbon = Carbon::parse($time)->format('h:i A');
        $search_array = array();

        array_push($search_array, $search_time_down->subMinutes(10)->format('h:i A'), $search_time_down->addMinutes(5)->format('h:i A'));
        array_push($search_array, $search_time_carbon);
        array_push($search_array, $search_time_up->addMinutes(5)->format('h:i A'), $search_time_up->addMinutes(5)->format('h:i A'));
        $schedule = $this->getSlotsForSchedules($date);

        $intersecting_times = array_intersect($schedule, $search_array);
        return $intersecting_times;
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeSlotBookable(Builder $query)
    {
        $this->dd('YAAS');
        return $query;
    }
    public function scopePublishable(Builder $query)
    {
        return $query->whereHas('menus')->whereHas('menus');
    }

    public function scopeHasScheduleForDate(Builder $query, $date)
    {
        $query->whereHas('schedules', function (Builder $q) use ($date) {
            $q->where('from_date', '<', $date)
                ->where('to_date', '>', $date);
        });
    }

    public function scopeByCuisine(Builder $query, $cuisine)
    {
        $query->whereHas('cuisines', function ($q) use ($cuisine) {
            return $q->where('id', $cuisine);
        });
    }
}
