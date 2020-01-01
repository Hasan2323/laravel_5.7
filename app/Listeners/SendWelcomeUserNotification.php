<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Notifications\WelcomeRegisteredUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeUserNotification
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event) //here $event is a instance of ProjectCreated Event class
    {
        $event->user->notify(new WelcomeRegisteredUser($event->user));
    }
}
