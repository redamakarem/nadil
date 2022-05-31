<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use App\Models\BookingsTables;
use Livewire\Component;

class Edit extends Component
{
    public Booking $booking;

    public function render()
    {
        return view('livewire.admin.booking.edit');
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
}
