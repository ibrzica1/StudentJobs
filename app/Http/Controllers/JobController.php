<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHelperJobRequest;
use App\Http\Requests\CreateJobRequest;
use App\Models\Job;
use App\Repositories\CompanyRepository;
use App\Repositories\JobRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    private $jobRepository;
    private $companyRepository;

    public function __construct()
    {
        $this->jobRepository = new JobRepository();
        $this->companyRepository = new CompanyRepository();
    }

    public function show(Job $job)
    {
        $job->load('location','company');
        $similarJobs = $this->jobRepository->similarJobs(10,$job->category,$job->id);
        return view("showJob",['job' => $job],['similarJobs' => $similarJobs]);
    }

    public function createJobHelper($category)
    {
        return view('helperJobCreate',['category' => $category]);
    }

    public function storeJobHelper(CreateHelperJobRequest $request): RedirectResponse
    {
        $this->jobRepository->storeHelperJob($request);
        return redirect()->route('homepage');
    }

    public function createJob($category)
    {
        $companies = $this->companyRepository->getUserCompanies(Auth::id());
        return view('jobCreate',['companies' => $companies, 'category' => $category]);
    }

    public function storeJob(CreateJobRequest $request): RedirectResponse
    {
        $this->jobRepository->storeJob($request);
        return redirect()->route('homepage');
    }

    public function categories($jobType)
    {
        return view('categories',['jobType' => $jobType]);
    }
}
