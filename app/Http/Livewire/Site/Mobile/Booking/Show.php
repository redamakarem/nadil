<?php

namespace App\Http\Livewire\Site\Mobile\Booking;

use Carbon\Carbon;
use App\Models\Booking;
use Livewire\Component;
use Carbon\CarbonPeriod;
use App\Models\BookingsTables;
use App\Events\NewBookingEvent;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $slots;
    public $selected_date;
    public $selected_time;
    public $display_date;
    public $restaurant;
    public $schedule;
    public $seats;
    public Booking $booking;
    public $available_tables;


    protected $rules = [
        'selected_date' => ['required', 'date'],
        'selected_time' => ['required'],
        'seats' => ['required', 'numeric', 'min:1'],


    ];

    public function mount($restaurant)
    {

        $this->restaurant = $restaurant;
        $this->booking = new Booking();
        $this->selected_date = Carbon::now()->format('Y-m-d');
        $this->display_date = Carbon::now()->format('M d Y');
        $this->getSlotsForSchedules($this->restaurant);
        $this->restaurant->load(['bookings', 'bookings.reserved_tables']);
    }

    public function getSlotsForSchedules()
    {
        $schedule = $this->restaurant->schedules->filter(function ($item) {
            $sDate = Carbon::parse($this->selected_date);
            $this->display_date = Carbon::create($this->selected_date);
            $this->display_date = $this->display_date->format('M d Y');
            if ($sDate->between($item->from_date, $item->to_date)) {
                return $item;
            }
        })->first();
        if ($schedule) {
            $this->schedule = $schedule;
            $this->slots = $this->getTimeSlots($schedule->from_time, "{$schedule->slot_length} minutes", $schedule->to_time);
        } else {
            $this->slots = [];
        }
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

    public function checkSlotAvailability($time)
    {
    }



    public function updatedSelectedDate($value)
    {
        $this->display_date = $this->selected_date;
    }

    public function setSelectedTime($time)
    {
        //        dd($time);
        $parsed_time = Carbon::parse($time)->format('H:i');
        //        dd($parsed_time);
        $this->selected_time = $time;
    }

    public function updatedSelectedTime($value)
    {
        dd($this->selected_time);
    }

    public function getAvailableTables($date, $time)
    {
        $reserved_tables = BookingsTables::where('booking_date', $date)
            ->where(function ($query) use ($time) {
                $query->where('booking_time', '<=', $time);
                $query->where('booking_end_time', '>=', $time);
            })->pluck('table_id');
        $this->available_tables = $this->restaurant->diningTables->whereNotIn('id', $reserved_tables);
    }

    public function getAvailableSeats($time_slot)
    {
        $input_date = Carbon::parse($this->selected_date)->format('Y-m-d');
        $input_time =  Carbon::parse($time_slot)->format('H:i:s');
        $this->getAvailableTables($input_date, $input_time);
        if (count($this->available_tables)) {
            return $this->available_tables->sum('capacity');
        } else {
            return 0;
        }
    }

    public function slot_bookable($time_slot)
    {
        $input_date = Carbon::parse($this->selected_date)->format('Y-m-d');
        $input_time =  Carbon::parse($time_slot)->format('H:i:s');
        return $this->getAvailableSeats($input_time) >= $this->seats;
    }



    public function submit()
    {

        $this->validate();
        $input_time =  Carbon::parse($this->selected_time)->format('H:i:s');
        if ($this->getAvailableSeats($input_time) >= $this->seats) {
            $this->booking->restaurant_id = $this->restaurant->id;
            if (Auth::check()) {
                $this->booking->user_id = auth()->user()->id;
            }
            if (Auth::check()) {
                $this->booking->phone = auth()->user()->profile->phone;
            } else {
                $this->booking->phone = 'aaaaaaa';
            }
            $this->booking->booking_date = Carbon::parse($this->selected_date)->format('Y-m-d');
            $this->booking->booking_time = Carbon::parse($this->selected_time)->format('H:i:s');
            $this->booking->seats = $this->seats;
            $this->booking->booking_end_time = Carbon::parse($this->selected_time)->addMinutes($this->restaurant->estimated_dining_time)->format('H:i:s');
            $new_booking = $this->booking->save();
            $seat_num = $this->seats;
            $tables_to_book = array();

            foreach ($this->available_tables as $available_table) {
                array_push($tables_to_book, $available_table->id);
                $seat_num -= $available_table->capacity;
                if ($seat_num <= 0)
                    break;
            }
            foreach ($tables_to_book as $item) {
                BookingsTables::create([
                    'booking_id' => $this->booking->id,
                    'table_id' => $item,
                    'booking_date' => $this->booking->booking_date,
                    'booking_time' => $this->booking->booking_time,
                    'restaurant_id' => $this->restaurant->id,
                    'booking_end_time' => Carbon::parse($this->selected_time)->addMinutes($this->restaurant->estimated_dining_time)->format('H:i:s'),
                ]);
            }
            event(new NewBookingEvent($this->restaurant->owner, $this->booking));
        } else {
            $this->addError('booking_seats', 'Not enough seats for selected date and time');
        }
    }
    
    
    
    public function render()
    {
        return view('livewire.site.mobile.booking.show');
    }
}
