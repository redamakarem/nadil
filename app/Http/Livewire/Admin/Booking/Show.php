<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use App\Models\BookingsTables;
use Livewire\Component;

class Show extends Component
{
    public $booking;


    public function mount($booking)
    {
        $this->booking = $booking;
    }

    public function render()
    {

        return view('livewire.admin.booking.show');
    }
}
