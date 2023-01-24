<?php

namespace App\Listeners;

use App\Events\NewBookingEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirnationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewSiteBookingListener
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
    public function handle(\App\Events\NewBookingEvent $event)
    {
        
        Mail::to($event->user->email)->send(new BookingConfirnationMail($event->user,$event->booking));
    }
}
