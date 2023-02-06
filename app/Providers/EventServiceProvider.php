<?php

namespace App\Providers;

use App\Events\BookingCancelledEvent;
use App\Events\NewBookingEvent;
use App\Events\UserRegistered;
use App\Listeners\BookingCancelledListener;
use App\Listeners\NewSiteBookingListener;
use App\Listeners\UserRegisteredListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Twitter\TwitterExtendSocialite;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewBookingEvent::class => [
            NewSiteBookingListener::class,
        ],
        BookingCancelledEvent::class => [
            BookingCancelledListener::class,
        ],
        UserRegistered::class => [UserRegisteredListener::class],
        SocialiteWasCalled::class => [
            TwitterExtendSocialite::class . '@handle',
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // ... other providers
            \SocialiteProviders\Google\GoogleExtendSocialite::class.'@handle',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
