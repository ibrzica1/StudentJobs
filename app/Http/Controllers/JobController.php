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
use Illuminate\View\View;

class JobController extends Controller
{
    private object $jobRepository;
    private object $companyRepository;

    public function __construct()
    {
        $this->jobRepository = new JobRepository();
        $this->companyRepository = new CompanyRepository();
    }

    public function show(Job $job): View
    {
        $job->load('location','company');
        $similarJobs = $this->jobRepository->similarJobs(10,$job->category,$job->id);
        return view("job/showJob",['job' => $job],['similarJobs' => $similarJobs]);
    }

    public function createJobHelper(string $category): View
    {
        return view('job/helperJobCreate',['category' => $category]);
    }

    public function storeJobHelper(CreateHelperJobRequest $request): RedirectResponse
    {
        $this->jobRepository->storeHelperJob($request);
        return redirect()->route('homepage');
    }

    public function createJob(string $category): View
    {
        $companies = $this->companyRepository->getUserCompanies(Auth::id());
        return view('job/jobCreate',['companies' => $companies, 'category' => $category]);
    }

    public function storeJob(CreateJobRequest $request): RedirectResponse
    {
        $this->jobRepository->storeJob($request);
        return redirect()->route('homepage');
    }

    public function categories(string $jobType): View
    {
        return view('job/categories',['jobType' => $jobType]);
    }

    
    public function myAds()
    {
        $ads = $this->jobRepository->getMyJobs();
        return view('job/myAds',['ads' => $ads]);
    }
}
