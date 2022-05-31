<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use Livewire\Component;

class Calendar extends Component
{

    public $bookings;
    public $events;
    public function mount()
    {
        $this->bookings = Booking::all();
        $this->events = $this->convertBookingsToCalendarEevents();

    }

    public function convertBookingsToCalendarEevents()
    {
        $calendar_events = $this->bookings->map(function ($item){
           return [
               'id' => $item->id,
               'title' => 'NDL-'.$item->id,
               'start' => $item->booking_date.' '.$item->booking_time,
               'end' => $item->booking_date.' '.$item->booking_end_time,
               'url' => route('admin.bookings.show',$item->id)
           ];
        });
        return json_encode($calendar_events);
    }

    public function render()
    {
        return view('livewire.admin.booking.calendar');
    }
}
