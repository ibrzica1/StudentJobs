<?php

namespace App\Listeners;

use App\Events\ApplicationAcceptedEvent;
use App\Jobs\SendStudentInfoMailJob;
use App\Mail\StudentInfoMail;
use Illuminate\Support\Facades\Mail;

class SendStudentInfoMailListener
{

    public function __construct()
    {
        //
    }

    /* public function handle(ApplicationAcceptedEvent $event): void
    {
        SendStudentInfoMailJob::dispatch($event->application);
    } */
}
