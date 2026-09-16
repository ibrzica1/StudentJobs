<?php

namespace App\Listeners;

use App\Events\ApplicationAcceptedEvent;
use App\Events\ApplicationRejectOthers;
use App\Models\Job;
use App\Repositories\JobRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateJobStatusToPromised
{
    private JobRepository $jobRepo;

    public function __construct()
    {
        $this->jobRepo = new JobRepository();
    }

    
    public function handle(ApplicationRejectOthers $event): void
    {
        $this->jobRepo->updateStatus($event->application->job_id,Job::PROMISED);
    }
}
