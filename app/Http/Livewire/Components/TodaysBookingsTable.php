<?php

namespace App\Http\Livewire\Components;

use App\Models\Booking;
use App\Models\BookingStatus;
use Livewire\Component;

class TodaysBookingsTable extends Component
{

    public $bookings;
    public $bookingStatuses;
    public $status_id;


    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($status_id = 1)
    {
        $this->status_id = $status_id;
        $ids= auth()->user()->restaurants->pluck('id');
        $this->bookings = Booking::with(['user'])->where('booking_status_id',$this->status_id)
        ->whereIn('restaurant_id',$ids)->get();
        $this->bookingStatuses = BookingStatus::all();
        // dd($this->bookings);
    }

    public function updateBookingStatus(Booking $booking, $status_id)
    {
        $booking->update([
            'booking_status_id' => $status_id
        ]);
        $booking->save();
        // // $this->emit('refreshComponent');
        $ids= auth()->user()->restaurants->pluck('id');
        $this->bookings = Booking::with(['user'])->where('booking_status_id',$this->status_id)->whereIn('restaurant_id',$ids)->get();
    }

    public function render()
    {
        return view('livewire.components.todays-bookings-table');
    }
}
