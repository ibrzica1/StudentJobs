<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHelperJobRequest;
use App\Http\Requests\CreateJobRequest;
use App\Models\Job;
use App\Repositories\CompanyRepository;
use App\Repositories\JobRepository;
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
        return view("showJob",['job' => $job]);
    }

    public function createJobHelperPage()
    {
        return view("helperJobCreate");
    }

    public function createJobHelper(CreateHelperJobRequest $request)
    {
        $this->jobRepository->createHelperJob($request);
    }

    public function createJobPage()
    {
        $companies = $this->companyRepository->getUserCompanies(Auth::id());
        return view('jobCreate',['companies' => $companies]);
    }

    public function createJob(CreateJobRequest $request)
    {
        $this->jobRepository->createJob($request);
    }
}
