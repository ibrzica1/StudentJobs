<?php

namespace App\Repositories;

use App\Http\Requests\CreateHelperJobRequest;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateHelperJobRequest;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class JobRepository
{
    private object $jobModel;

    public function __construct()
    {
       $this->jobModel = new Job();
    }

    public function storeHelperJob(CreateHelperJobRequest $request): Job
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

    public function storeJob(CreateJobRequest $request): Job
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

    public function update(int $jobId, array $request): void
    {
        $this->jobModel->where('id',$jobId)->update($request);
        Cache::forget('my_ads');
    }

    public function getLatestJobs(): object
    {
        $page = request('page',1);
        $cacheKey = 'latest_jobs_'.$page;
        $jobs = Cache::remember($cacheKey,120,function () {
            return $this->jobModel->with('company','location')->latest('created_at')->paginate();
        });
        
        return $jobs;
    }

    public function getLatestJobsByCategory(string $category): object
    {
        $page = request('page',1);
        $cacheKey = 'latest_jobs_'.$category.'_'.$page;
        $jobs = Cache::remember($cacheKey,120,function () use($category){
            return $this->jobModel->where('category',$category)->with('company','location')->latest('created_at')->paginate();
        });
        return $jobs;
    }

    public function getLatestJobsByType(string $type): object
    {
        $page = request('page',1);
        $cacheKey = 'latest_jobs_'.$type.'_'.$page;
        $jobs = Cache::remember($cacheKey,120,function () use($type){
            return $this->jobModel->where('type',$type)->with('company','location')->latest('created_at')->paginate();
        });
        return $jobs;
    }

    public function similarJobs(int $limit, string $category, int $id): object
    {
        $cacheKey = 'similar_job_'.$category.'_'.$id;
        $jobs = Cache::remember($cacheKey,120,function () use($limit,$category,$id){
            return $this->jobModel
            ->where('category',$category)
            ->latest()
            ->take($limit)
            ->get()
            ->except($id);
        });

        return $jobs;
    }

    public function getMyJobs():object
    {
        $jobs = Cache::remember('my_ads',120,function() {
            return $this->jobModel
            ->where('employer_id', Auth::id())
            ->latest()
            ->get();
        });

        return $jobs;
    }

    public function getJob(int $id): Job
    {
        return $this->jobModel->where('id',$id)->first();
    }

    public function delete(Job $job): void
    {
       $this->jobModel->where('id',$job->id)->delete();
       Cache::forget('my_ads');
    }
}