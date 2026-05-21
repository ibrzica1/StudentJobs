<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHelperJobRequest;
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
        return view("jobCreate");
    }

    public function createJobHelper(CreateHelperJobRequest $request)
    {
        $this->jobRepository->createNew($request);
    }
}
