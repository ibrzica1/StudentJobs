<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHelperJobRequest;
use App\Http\Requests\CreateJobRequest;
use App\Repositories\JobRepository;
use Illuminate\Http\Request;

class JobController extends Controller
{
    private $jobRepository;

    public function __construct()
    {
        $this->jobRepository = new JobRepository();
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
        return view("jobCreate");
    }

    public function createJob(CreateJobRequest $request)
    {
        $this->jobRepository->createJob($request);
    }
}
