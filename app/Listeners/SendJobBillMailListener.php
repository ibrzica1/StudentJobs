<?php

namespace App\Listeners;

use App\Events\BillCreatedEvent;
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
       
        Mail::to('test@inbox.mailtrap.io')->send(new BillJobAdMail($event->bill));
    }
}
