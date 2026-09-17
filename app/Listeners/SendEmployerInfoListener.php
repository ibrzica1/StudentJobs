<?php

namespace App\Listeners;

use App\Events\ApplicationAcceptedEvent;
use App\Mail\EmployerInfoMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmployerInfoListener
{
   
    public function __construct()
    {
        //
    }

    public function handle(ApplicationAcceptedEvent $event): void
    {
        Mail::to('test@inbox.mailtrap.io')->send(new EmployerInfoMail($event->application));
    }
}
