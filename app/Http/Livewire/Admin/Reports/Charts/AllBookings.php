<?php

namespace App\Http\Livewire\Admin\Reports\Charts;

use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AllBookings extends Component
{

    public $bookings;
    public $results;
    public function mount()
    {
        $this->getAllBookings();
        dd($this->results);
    }


    public function getAllBookings()
    {
        $this->results=DB::table('bookings')
        ->join('booking_statuses', 'booking_status_id', '=', 'booking_statuses.id')
            ->select('booking_status_id',DB::raw('booking_statuses.name_en as Status'),DB::raw('count(booking_status_id) as count'))
        ->groupBy('booking_status_id','booking_statuses.name_en')
        ->get();
    }
    public function render()
    {
        return view('livewire.admin.reports.charts.all-bookings');
    }
}
