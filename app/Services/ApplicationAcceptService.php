<?php

namespace App\Services;

use App\Events\ApplicationAcceptedEvent;
use App\Events\ApplicationRejectOthers;
use App\Models\Application;
use App\Repositories\ApplicationRepository;

class ApplicationAcceptService
{
    private ApplicationRepository $applicationRepo;

    public function __construct()
    {
        $this->applicationRepo = new ApplicationRepository();
    }

    public function acceptApplication(Application $application)
    {
        
        $this->applicationRepo->acceptApplicantUpdate($application);
        event(new ApplicationAcceptedEvent($application));
        $job = $application->job;
        $numberOfAcceptedApplicants = $job->applications
                                            ->where('accept_status',Application::APPROVED)
                                            ->count();
        
        if($numberOfAcceptedApplicants === $job->employee_amount){
            event(new ApplicationRejectOthers($application));
        }
    }
}