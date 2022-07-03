<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;


class NewBookingEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Booking $booking;
    public User $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user,Booking $booking)
    {
        $this->booking = $booking;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('RestaurantAdmin.'. $this->user['id']. '.Booking');
    }

    public function broadcastAs()
    {
        return 'nadilBooking';
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->booking->user->name . ' ' . 'made a booking on ' . Carbon::parse($this->booking->booking_date)->format('Y-m-d')
        ];
    }
}
