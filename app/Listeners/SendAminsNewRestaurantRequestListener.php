<?php

namespace App\Listeners;

use App\Events\RestarantRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAminsNewRestaurantRequestListener
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
     * @param  RestarantRegisteredEvent  $event
     * @return void
     */
    public function handle(RestarantRegisteredEvent $event)
    {
        //
    }
}
