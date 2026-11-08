<?php

namespace App\Jobs;

use App\Models\Bill;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\BillJobAdMail;
use Illuminate\Support\Facades\Mail;

class SendJobBillMailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Bill $bill)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('test@inbox.mailtrap.io')->send(new BillJobAdMail($this->bill));
    }
}
