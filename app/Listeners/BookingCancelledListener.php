<?php

namespace App\Listeners;

use App\Mail\BookingCancelledMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingCancelledListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(\App\Events\BookingCancelledEvent $event)
    {
        
        Mail::to($event->user->email)->send(new BookingCancelledMail($event->user,$event->booking));
    }
}
