<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use App\Models\BookingsTables;
use Livewire\Component;

class Show extends Component
{
    public Booking $booking;


    public function mount($booking)
    {
        $this->booking = $booking;
        // dd($this->booking->reserved_tables);
    }

    public function render()
    {

        return view('livewire.admin.booking.show');
    }
}
