<?php

namespace App\Events;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BookingCancelledEvent
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
    }
}
