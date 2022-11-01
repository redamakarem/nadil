<?php

namespace App\Http\Livewire\Components;

use App\Models\Booking;
use Livewire\Component;

class TodaysBookingsTable extends Component
{

    public $bookings;

    public function mount($status_id = 1)
    {
        $this->bookings = Booking::with(['user'])->where('booking_status_id',$status_id)->get();
    }
    public function render()
    {
        return view('livewire.components.todays-bookings-table');
    }
}
