<?php

namespace App\Listeners;

use App\Events\BillCreatedEvent;
use App\Jobs\SendJobBillMailJob;
use App\Mail\BillJobAdMail;
use Illuminate\Support\Facades\Mail;

class SendJobBillMailListener
{
   
    public function __construct()
    {
        //
    }

    public function handle(BillCreatedEvent $event): void
    {
       
        SendJobBillMailJob::dispatch($event->bill);
    }
}
