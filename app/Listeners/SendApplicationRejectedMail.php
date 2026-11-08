<?php

namespace App\Listeners;

use App\Events\AppllicationRejectedEvent;
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
        Mail::to('test@inbox.mailtrap.io')->queue(new ApplicationRejectedMail($event->application));
    }
}
