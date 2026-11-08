<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Jobs\SendWelcomeEmail;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class SendWelcomeMailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreatedEvent $event): void
    {
        SendWelcomeEmail::dispatch($event->user);
    }
}
