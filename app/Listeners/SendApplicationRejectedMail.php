<?php

namespace App\Listeners;

use App\Events\ApplicationAcceptedEvent;
use App\Events\ApplicationRejectedEvent;
use App\Events\AppllicationRejectedEvent;
use App\Mail\ApplicationRejectedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendApplicationRejectedMail
{
   
    public function __construct()
    {
        //
    }

   
    public function handle(AppllicationRejectedEvent $event): void
    {
        Mail::to('test@inbox.mailtrap.io')->send(new ApplicationRejectedMail($event->application));
    }
}
