<?php

namespace App\Providers;

use App\Events\ProjectCreated;
use App\Events\UserCreated;
use App\Listeners\SendProjectCreatedNotification;
use App\Listeners\SendWelcomeUserNotification;
use Illuminate\Support\Facades\Event;
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

        ProjectCreated::class => [
            SendProjectCreatedNotification::class,
        ],

        UserCreated::class => [
            SendWelcomeUserNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
