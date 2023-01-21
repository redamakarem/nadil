<?php

namespace App\Http\Livewire\Admin\Reports\Charts;

use App\Models\Booking;
use Livewire\Component;
use App\Models\BookingStatus;
use Illuminate\Support\Facades\DB;

class AllBookings extends Component
{

    public $bookings;
    public $result;
    public function mount()
    {
        $this->getAllBookings();
        
    }


    public function getAllBookings()
    {
        $this->result= BookingStatus::withCount('bookings')->get()->toArray();
    }
    public function render()
    {
        return view('livewire.admin.reports.charts.all-bookings');
    }
}
