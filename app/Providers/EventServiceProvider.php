<?php

namespace App\Providers;

use App\Listeners\LoginAttempts\LogAuthenticationAttempt;
use App\Listeners\LoginAttempts\LogLockout;
use App\Listeners\LoginAttempts\LogSuccessfulLogin;
use App\Listeners\LoginAttempts\LogSuccessfulLogout;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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

        Attempting::class => [
            LogAuthenticationAttempt::class,
        ],

        Login::class => [
            LogSuccessfulLogin::class,
        ],

        Logout::class => [
            LogSuccessfulLogout::class,
        ],

        Lockout::class => [
            LogLockout::class,
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
