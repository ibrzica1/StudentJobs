<?php

namespace App\Listeners;

use App\Events\JobCreatedEvent;
use App\Jobs\SendJobCreatedEmailJob;

class SendJobCreatedEmailListener
{
    
    public function __construct()
    {
        //
    }

    public function handle(JobCreatedEvent $event): void
    {
        SendJobCreatedEmailJob::dispatch($event->job);
    }
}
