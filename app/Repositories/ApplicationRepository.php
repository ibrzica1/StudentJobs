<?php

namespace App\Repositories;

use App\Enums\ApplicationAcceptStatusesEnum;
use App\Enums\ApplicationSeenStatusesEnum;
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
            'accept_status' => ApplicationAcceptStatusesEnum::PENDING->value,
            'seen_status' => ApplicationSeenStatusesEnum::UNSEEN->value
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
        ->update(['accept_status' => ApplicationAcceptStatusesEnum::APPROVED->value]);
    }

    public function rejectOtherApplicantsUpdate(Application $application): void
    {
        $this->applicationModel
        ->where('job_id',$application->job_id)
        ->where('accept_status', ApplicationAcceptStatusesEnum::PENDING->value)
        ->update(['accept_status' => ApplicationAcceptStatusesEnum::REJECTED->value]);
    }

    public function rejectApplicantUpdate(Application $application): void
    {
        $this->applicationModel
        ->where('id',$application->id)
        ->update(['accept_status' => ApplicationAcceptStatusesEnum::REJECTED->value]);
    }

    public function changeSeenStatus(Application $application):void
    {
        $this->applicationModel
        ->where('id',$application->id)
        ->update(['seen_status' => ApplicationSeenStatusesEnum::SEEN->value]);
    }

    public function changeAllSeenStatus(Application $application): void
    {
         $this->applicationModel
        ->where('job_id',$application->job_id)
        ->update(['seen_status' => ApplicationSeenStatusesEnum::SEEN->value]);
    }

    public function applicationDoesntExist(Job $job): bool
    {
        $application = $this->applicationModel
                        ->where('job_id',$job->id)
                        ->where('user_id', Auth::id())
                        ->get();
        if($application){
            return false;
        } else {
            return true;
        }
    }

    public function delete(Application $application): void
    {
        $this->applicationModel
        ->where('id',$application->id)
        ->delete();
    }
}