<?php

namespace App\Listeners;

use App\Events\ApplicationAcceptedEvent;
use App\Mail\StudentInfoMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendStudentInfoMailListener
{

    public function __construct()
    {
        //
    }

    public function handle(ApplicationAcceptedEvent $event): void
    {
        Mail::to('test@inbox.mailtrap.io')->send(new StudentInfoMail($event->application));
    }
}
