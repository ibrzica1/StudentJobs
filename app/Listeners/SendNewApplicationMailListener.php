<?php

namespace App\Listeners;

use App\Events\ApplicationCreatedEvent;
use App\Mail\NewApplication;
use App\Models\Application;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewApplicationMailListener
{
    
    public function __construct(public Application $application)
    {
        //
    }

    public function handle(ApplicationCreatedEvent $event): void
    {
        Mail::to('test@inbox.mailtrap.io')->send(new NewApplication($event->application));
    }
}
