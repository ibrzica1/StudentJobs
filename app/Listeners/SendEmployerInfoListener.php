<?php

namespace App\Listeners;

use App\Events\ApplicationAcceptedEvent;
use App\Jobs\SendEmployerInfoMailJob;
use App\Mail\EmployerInfoMail;
use Illuminate\Support\Facades\Mail;

class SendEmployerInfoListener
{
   
    public function __construct()
    {
        //
    }

    public function handle(ApplicationAcceptedEvent $event): void
    {
        SendEmployerInfoMailJob::dispatch($event->application);
    }
}
