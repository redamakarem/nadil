<?php

namespace App\Providers;
use App\View\Components\Base;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::component('mail.base', Base::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Str::macro('initials', fn($value, $sep = ' ', $glue = ' ') => trim(collect(explode($sep, $value))->map(function ($segment) {
            return $segment[0] ?? '';
        })->join($glue)));
        // Blade::component('mail.base', \App\Views\Components\Base::class);
    }
}
