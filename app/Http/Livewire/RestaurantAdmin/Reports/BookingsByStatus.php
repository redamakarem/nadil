<?php

namespace App\Http\Livewire\RestaurantAdmin\Reports;

use App\Models\BookingStatus;
use App\Models\Restaurant;
use Livewire\Component;

class BookingsByStatus extends Component
{

    public $bookings;
    public $result;
    public $restaurant;
    public function mount($id)
    {
        
        $this->restaurant = Restaurant::findOrFail($id);
        $this->getAllBookings();
        
        
    }


    public function getAllBookings()
    {
        $this->result= BookingStatus::withCount(['bookings' => function ($query) {
            $query->where('restaurant_id', $this->restaurant->id);
        }])->get()->toArray();
    }
    public function render()
    {
        return view('livewire.restaurant-admin.reports.bookings-by-status');
    }
}
