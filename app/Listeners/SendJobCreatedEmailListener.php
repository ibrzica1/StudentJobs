<?php

namespace App\Listeners;

use App\Events\JobCreatedEvent;
use App\Mail\JobCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendJobCreatedEmailListener
{
    
    public function __construct()
    {
        //
    }

    public function handle(JobCreatedEvent $event): void
    {
        Mail::to('test@inbox.mailtrap.io')->send(new JobCreatedMail($event->job));
    }
}
