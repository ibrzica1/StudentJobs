<?php

namespace App\Repositories;

use App\Http\Requests\CreateApplicationRequest;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ApplicationRepository
{
    private object $applicationModel;

    public function __construct()
    {
        $this->applicationModel = new Application();
    }

    public function store(array $request): Application
    {
        $application = $this->applicationModel->create([
            'text' => $request['text'],
            'user_id' => Auth::id(),
            'job_id' => $request['job_id'],
            'accept_status' => Application::PENDING,
            'seen_status' => Application::UNSEEN
        ]);   

        return $application;
    }

    public function getJobApplications(Job $job): Collection
    {
        $applications = $this->applicationModel
                        ->where('job_id',$job->id)
                        ->orderBy('seen_status','desc')
                        ->get();

        return $applications;
    }

    public function getMyApplications(): Collection
    {
        $applications = $this->applicationModel
                        ->where('user_id',Auth::id())
                        ->orderBy('id','desc')
                        ->get();

        return $applications;
    }

    public function acceptApplicantUpdate(Application $application): void
    {
        $this->applicationModel
        ->where('id',$application->id)
        ->update(['accept_status' => $this->applicationModel::APPROVED]);
    }

    public function rejectOtherApplicantsUpdate(Application $application): void
    {
        $this->applicationModel
        ->where('job_id',$application->job_id)
        ->where('accept_status', $this->applicationModel::PENDING)
        ->update(['accept_status' => $this->applicationModel::REJECTED]);
    }

    public function rejectApplicantUpdate(Application $application): void
    {
        $this->applicationModel
        ->where('id',$application->id)
        ->update(['accept_status' => $this->applicationModel::REJECTED]);
    }

    public function changeSeenStatus(Application $application):void
    {
        $this->applicationModel
        ->where('id',$application->id)
        ->update(['seen_status' => $this->applicationModel::SEEN]);
    }

    public function changeAllSeenStatus(Application $application): void
    {
         $this->applicationModel
        ->where('job_id',$application->job_id)
        ->update(['seen_status' => $this->applicationModel::SEEN]);
    }

    public function delete(Application $application): void
    {
        $this->applicationModel
        ->where('id',$application->id)
        ->delete();
    }
}