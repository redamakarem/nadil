<?php

namespace App\Http\Livewire\Site\Mobile\User;

use App\Models\Booking;
use Livewire\Component;
use App\Models\BookingsTables;

class History extends Component
{

    public $bookings;
    public $idToRemove;
    public $profile;


    protected $listeners = ['bookingDeleteConfirmed' => 'deleteBooking'];




    public function confirmBookingDeletion($id)
    {
        $this->idToRemove = $id;
        $this->dispatchBrowserEvent('show-swal-delete');
    }

    public function deleteBooking()
    {
        $booking_to_delete = Booking::findOrFail($this->idToRemove);
        if($booking_to_delete){
            BookingsTables::where('booking_date',$booking_to_delete->booking_date)
            ->where('booking_time',$booking_to_delete->booking_time)->delete();
            $booking_to_delete->booking_status_id=5;
            $booking_to_delete->save();
        }
    }
    public function render()
    {
        return view('livewire.site.mobile.user.history');
    }

    public function mount($bookings,$profile)
    {
        $this->bookings = $bookings;
        $this->profile = $profile;
    }
}
