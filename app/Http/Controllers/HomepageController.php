<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Repositories\JobRepository;
use App\Rules\AllowedCategoryTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomepageController extends Controller
{
    private $jobRepo;

    public function __construct()
    {
        $this->jobRepo = new JobRepository();
    }

    public function index()
    {
        $jobs = $this->jobRepo->getLatestJobs();
        return view('welcome',['jobs' => $jobs]);
    }

    public function indexCategory($category)
    {
        if(!in_array($category,Job::ALLOWED_HELPER_TYPES)){
            redirect()->back()->withErrors('Incorrect category type');
        }
        $jobs = $this->jobRepo->getLatestJobsByCategory($category);
        return view('welcome',['jobs' => $jobs]);
    }

     public function indexType($type)
    {
        if(!in_array($type,Job::ALLOWED_JOB_TYPES)){
            redirect()->back()->withErrors('Incorrect job type');
        }
        $jobs = $this->jobRepo->getLatestJobsByType($type);
        return view('welcome',['jobs' => $jobs]);
    }
}
