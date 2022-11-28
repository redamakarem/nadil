<?php

namespace App\Http\Livewire\Components;

use App\Models\Booking;
use App\Models\BookingStatus;
use Livewire\Component;

class TodaysBookingsTable extends Component
{

    public $bookings;
    public $bookingStatuses;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($status_id = 1)
    {
        $this->bookings = Booking::with(['user'])->where('booking_status_id',$status_id)->get();
        $this->bookingStatuses = BookingStatus::all();
    }

    public function updateBookingStatus(Booking $booking, $status_id)
    {
        $booking->update([
            'booking_status_id' => $status_id
        ]);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        return view('livewire.components.todays-bookings-table');
    }
}
