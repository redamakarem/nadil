<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use App\Models\BookingsTables;
use App\Models\Restaurant;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $restaurants;
    public $users;
    public $restaurant;
    public Booking $booking;
    public $schedule;
    public  $slots;
    public $selected_user;
    public $selected_restaurant;
    public $selected_date;
    public $selected_time;
    public $slot_options;
    public $seats;
    public $available_tables;
    public array $listsForFields = [];



    public function mount()
    {
        $this->restaurant = null;
        $this->slot_options = [];
        $this->restaurants = Restaurant::all();
        $this->users = User::role('user')->get();
        $this->booking = new Booking();
        $this->initListsForFields();
    }


    protected $rules = [
        'selected_restaurant' => 'required|exists:restaurants,id',
        'booking.user_id' => 'unique:users,id',
        'booking.phone' => 'required',
//        'booking.booking_date' => 'required',
//        'booking.booking_time' => 'required',
        'booking.seats' => ['required','numeric','min:1'],
        'selected_date' => ['required', 'date'],
        'selected_time' => ['required'],
        'selected_user' => ['required'],
        'restaurant' => ['required'],
    ];


    public function getAvailableSeats($time_slot)
    {
        $input_date = Carbon::parse($this->selected_date)->format('Y-m-d');
        $input_time =  Carbon::parse($time_slot)->format('H:i:s');
        $this->getAvailableTables($input_date,$input_time);
        if (count($this->available_tables)){
            return $this->available_tables->sum('capacity');
        }else{
            return 0;
        }

    }


    public function submit()
    {

        $this->validate();
        $input_time =  Carbon::parse($this->selected_time)->format('H:i:s');
        if ($this->getAvailableSeats($input_time) >= $this->booking->seats){
            $this->booking->restaurant_id = $this->selected_restaurant; 
            $this->booking->user_id = $this->selected_user;
            $this->booking->booking_date = Carbon::parse($this->selected_date)->format('Y-m-d');
            $this->booking->booking_time = Carbon::parse($this->selected_time)->format('H:i:s');
            $this->booking->booking_end_time = Carbon::parse($this->selected_time)->addMinutes($this->restaurant->estimated_dining_time)->format('H:i:s');
            $this->booking->booking_code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"), -5);
            $new_booking = $this->booking->save();
            $seat_num = $this->booking->seats;
            $tables_to_book = array();

            foreach ($this->available_tables as $available_table){
                array_push($tables_to_book,$available_table->id);
                $seat_num -=$available_table->capacity;
                if ($seat_num<=0)
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
//            $this->booking->reserved_tables()->sync($available_tables->first(),['booking_date' =>])
        }
        else{
            $this->addError('booking_seats','Not enough seats for selected date and time');
        }



    }
    public function getAvailableTables($date,$time)
    {
        $reserved_tables = BookingsTables::where('booking_date',$date)
            ->where(function ($query) use($time){
                $query->where('booking_time','<=',$time);
                $query->where('booking_end_time','>=',$time);
            })->pluck('table_id');
        $this->available_tables = $this->restaurant->diningTables->whereNotIn('id',$reserved_tables);
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['slots'] = collect($this->slots)->map(function ($slot){
            return [
                'slot' => $slot,
                'id' => $slot,
            ];
        })->pluck('slot','id')->toArray();
    }

    public function mapSlots()
    {
        $res = array();
        foreach (collect($this->slots) as $slot){
            $res[$slot] = $slot;
        }
        return $res;
    }

    public function getSlotsForSchedules()
    {
        $schedule = $this->restaurant->schedules->filter(function ($item) {
            $sDate = Carbon::parse($this->selected_date);
            if ($sDate->between($item->from_date, $item->to_date)) {
                return $item;
            }
        })->first();
        if ($schedule) {
            $this->schedule = $schedule;
            $this->slots = $this->getTimeSlots($schedule->from_time, "{$this->restaurant->estimated_dining_time} minutes", $schedule->to_time);

        } else {
            $this->slots = [];
        }
    }

    public function getTimeSlots($start_time, $end_time, $slot_length)
    {
        $period = CarbonPeriod::create($start_time, $slot_length, $end_time);
        $slots = [];
        foreach ($period as $item) {
            if(Carbon::parse($end_time)->format("h:i A") != $item->format("h:i A"))
                array_push($slots, $item->format("h:i A"));

        }
        return $slots;
    }

    public function updatedSelectedDate($value)
    {

        
        if ($this->restaurant){
            $this->getSlotsForSchedules();
        }
        $this->slot_options = $this->mapSlots();
    }

    public function updatedSelectedRestaurant($value)
    {
        $this->restaurant = Restaurant::find($value);
        
    }

    public function render()
    {
        return view('livewire.admin.booking.create');
    }
}
