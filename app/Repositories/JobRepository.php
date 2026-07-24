<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobRepository
{
    private $jobModel;

    public function __construct()
    {
       $this->jobModel = new Job();
    }

    public function storeHelperJob($request)
    {
        $job = $this->jobModel->create([
            'type' => $this->jobModel::HELPER_JOB,
            'category' => $request['category'],
            'title' => $request['title'],
            'employer_id' => Auth::id(),
            'location_id' => $request['location_id'],
            'address' => $request['address'],
            'employee_amount' => $request['employee_amount'],
            'wage' => $request['wage'],
            'start_date' => $request['start_date'],
            'from' => $request['from'],
            'to' => $request['to'],
            'description' => $request['description'],
            'tasks' => $request['tasks'],
            'expectation' => $request['expectation'],
        ]);

        return $job;
    }

    public function storeJob($request)
    {
        $job = $this->jobModel->create([
            'type' => $this->jobModel::JOB,
            'category' => $request['category'],
            'title' => $request['title'],
            'employer_id' => Auth::id(),
            'location_id' => $request['location_id'],
            'company_id' => $request['company_id'],
            'wage' => $request['wage'],
            'setting_type' => $request['setting_type'],
            'weekly_hours' => $request['weekly_hours'],
            'start_date' => $request['start_date'],
            'duration' => $request['duration'],
            'description' => $request['description'],
            'expectation' => $request['expectation'],
            'offer' => $request['offer'],
        ]);

        return $job;
    }

    public function getLatestJobs()
    {
        $jobs = Job::with('company','location')->latest('created_at')->paginate();
        return $jobs;
    }

    public function getLatestJobsByCategory($category)
    {
        $jobs = Job::where('category',$category)->with('company','location')->latest('created_at')->paginate();
        return $jobs;
    }

    public function getLatestJobsByType($type)
    {
        $jobs = Job::where('type',$type)->with('company','location')->latest('created_at')->paginate();
        return $jobs;
    }

    public function similarJobs(int $limit, string $category, int $id)
    {
        return $this->jobModel
        ->where('category',$category)
        ->latest()
        ->take($limit)
        ->get()
        ->except($id);
    }
}