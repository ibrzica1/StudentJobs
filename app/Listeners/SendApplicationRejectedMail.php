<?php

namespace App\Listeners;

use App\Events\AppllicationRejectedEvent;
use App\Jobs\SendApplicationRejectedMailJob;
use App\Mail\ApplicationRejectedMail;
use Illuminate\Support\Facades\Mail;

class SendApplicationRejectedMail
{
   
    public function __construct()
    {
        //
    }

   
    public function handle(AppllicationRejectedEvent $event): void
    {
        SendApplicationRejectedMailJob::dispatch($event->application);
    }
}
