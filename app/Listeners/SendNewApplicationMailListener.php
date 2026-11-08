<?php

namespace App\Listeners;

use App\Events\ApplicationCreatedEvent;
use App\Jobs\SendNewApplicationMailJob;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;

class SendNewApplicationMailListener
{
    
    public function __construct(public Application $application)
    {
        //
    }

    public function handle(ApplicationCreatedEvent $event): void
    {
        SendNewApplicationMailJob::dispatch($event->application);
    }
}
