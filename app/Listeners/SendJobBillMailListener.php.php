<?php

namespace App\Listeners;

use App\Events\BillCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendJobBillMailListener
{
  
    public function __construct()
    {
        //
    }

    public function handle(BillCreatedEvent $event): void
    {
        
    }
}
