<?php

namespace App\Http\Livewire\RestaurantAdmin\Booking;

use App\Models\Booking;
use Auth;
use Livewire\Component;

class Index extends Component
{
   

    public $idToRemove;

    public $bookings;




    protected $listeners = ['deleteConfirmed' => 'deleteBooking'];

    public function mount()
    {
        $restaurant_ids = Auth::user()->restaurants->pluck('id');
        $this->bookings =Booking::whereIn('restaurant_id',$restaurant_ids)->get();
        

    }




    public function confirmBookingDeletion($id)
    {
        $this->idToRemove = $id;
        $this->dispatchBrowserEvent('show-swal-delete');
    }

    public function deleteBooking()
    {
        $booking = Booking::findOrFail($this->idToRemove);
        $booking->delete();
    }

    public function render()
    {
        return view('livewire.restaurant-admin.booking.index');
    }
}
