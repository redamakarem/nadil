<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use Livewire\Component;
use App\Models\BookingsTables;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{

    public $events = '';
    public function getevent()
    {
        $events = Event::select('id','title','start')->get();
        return  json_encode($events);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */

    /**
     * Write code on Method
     *
     * @return response()
     */

    public $idToRemove;

    public $bookings;




    protected $listeners = ['bookingDeleteConfirmed' => 'deleteBooking'];

    public function mount()
    {
        $this->bookings = Booking::all();

    }




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
            $this->bookings =  Booking::all();
            $this->emit('refreshComponent');
        }
    }



    public function render()
    {

        return view('livewire.admin.booking.index');
    }
}
