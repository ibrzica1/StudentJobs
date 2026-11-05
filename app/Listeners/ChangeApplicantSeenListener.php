<?php

namespace App\Listeners;

use App\Events\ApplicationAcceptedEvent;
use App\Interfaces\ApplicationRepositoryInterface;

class ChangeApplicantSeenListener
{
    private ApplicationRepositoryInterface $applicationRepo;
    
    public function __construct(ApplicationRepositoryInterface $applicationRepositoryInterface)
    {
        $this->applicationRepo = $applicationRepositoryInterface;
    }

    public function handle(ApplicationAcceptedEvent $event): void
    {
        $this->applicationRepo->changeSeenStatus($event->application);
    }
}
