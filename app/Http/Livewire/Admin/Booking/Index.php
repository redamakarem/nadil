<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use Livewire\Component;

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




    protected $listeners = ['deleteConfirmed' => 'deleteBooking'];

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
        $booking = Booking::findOrFail($this->idToRemove);
        $booking->delete();
    }



    public function render()
    {

        return view('livewire.admin.booking.index');
    }
}
