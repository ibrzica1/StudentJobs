<?php

namespace App\Interfaces;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Support\Collection;

interface ApplicationRepositoryInterface
{
    public function store(array $request): Application;
    public function getJobApplications(Job $job): Collection;
    public function getMyApplications(): Collection;
    public function acceptApplicantUpdate(Application $application): void;
    public function rejectOtherApplicantsUpdate(Application $application): void;
    public function rejectApplicantUpdate(Application $application): void;
    public function changeSeenStatus(Application $application):void;
    public function changeAllSeenStatus(Application $application): void;
    public function applicationDoesntExist(Job $job): bool;
    public function delete(Application $application): void;
}