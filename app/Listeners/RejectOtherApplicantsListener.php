<?php

namespace App\Listeners;

use App\Events\ApplicationRejectOthers;
use App\Interfaces\ApplicationRepositoryInterface;

class RejectOtherApplicantsListener
{
    private ApplicationRepositoryInterface $applicationRepo;
    
    public function __construct(ApplicationRepositoryInterface $applicationRepositoryInterface)
    {
        $this->applicationRepo = $applicationRepositoryInterface;
    }

    public function handle(ApplicationRejectOthers $event): void
    {
        $this->applicationRepo->rejectOtherApplicantsUpdate($event->application);
    }
}
