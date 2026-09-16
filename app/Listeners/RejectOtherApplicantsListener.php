<?php

namespace App\Listeners;

use App\Events\ApplicationAcceptedEvent;
use App\Events\ApplicationRejectOthers;
use App\Repositories\ApplicationRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RejectOtherApplicantsListener
{
    private ApplicationRepository $applicationRepo;

    public function __construct()
    {
        $this->applicationRepo = new ApplicationRepository();
    }

    public function handle(ApplicationRejectOthers $event): void
    {
        $this->applicationRepo->rejectOtherApplicantsUpdate($event->application);
    }
}
