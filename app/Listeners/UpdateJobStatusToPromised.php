<?php

namespace App\Listeners;

use App\Enums\JobStatusesEnum;
use App\Events\ApplicationRejectOthers;
use App\Interfaces\JobRepositoryInterface;

class UpdateJobStatusToPromised
{
    private JobRepositoryInterface $jobRepo;

    public function __construct(JobRepositoryInterface $jobRepositoryInterface)
    {
        $this->jobRepo = $jobRepositoryInterface;
    }

    
    public function handle(ApplicationRejectOthers $event): void
    {
        $this->jobRepo->updateStatus($event->application->job_id,JobStatusesEnum::PROMISED->value);
    }
}
