<?php

namespace App\Jobs;

use App\Models\Application;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\ApplicationRejectedMail;
use Illuminate\Support\Facades\Mail;

class SendApplicationRejectedMailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Application $application)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         Mail::to('test@inbox.mailtrap.io')->send(new ApplicationRejectedMail($this->application));
    }
}
