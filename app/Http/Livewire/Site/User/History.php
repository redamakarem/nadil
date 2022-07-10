<?php

namespace App\Http\Livewire\Site\User;

use App\Models\Booking;
use Livewire\Component;

class History extends Component
{

    public $bookings;
    public $selected_booking;
    public $profile;

    public function mount($bookings, $profile)
    {
        $this->bookings = $bookings;
        $this->profile = $profile;
        $this->selected_booking = null;
    }

    public function render()
    {
        return view('livewire.site.user.history');
    }

    public function select_restaurant($b)
    {
        $this->selected_booking = Booking::findOrFail($b);
        
    }
}
