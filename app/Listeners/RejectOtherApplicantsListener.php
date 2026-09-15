<?php

namespace App\Listeners;

use App\Events\ApplicationAcceptedEvent;
use App\Repositories\ApplicationRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RejectOtherApplicantsListener
{
    private $applicationRepo;

    public function __construct()
    {
        $this->applicationRepo = new ApplicationRepository();
    }

    public function handle(ApplicationAcceptedEvent $event): void
    {
        $this->applicationRepo->rejectOtherApplicantsUpdate($event->application);
    }
}
