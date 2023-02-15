<?php

namespace App\Providers;

use App\Mail\NadilVerificationMail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Mail;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            // return (new MailMessage())
            //     ->subject('Verify Email Address')
            //     ->action('Verify Email Address', $url)
            //     ->view('emails.verify', compact('url'));
            Mail::to($notifiable->email)->send(new NadilVerificationMail($notifiable,$url));
        });
    }
}
