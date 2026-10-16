<?php

namespace App\Http\Controllers;

use App\Enums\JobCategories;
use App\Enums\JobTypesEnum;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Repositories\JobRepository;
use App\Rules\AllowedCategoryTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class HomepageController extends Controller
{
    private object $jobRepo;

    public function __construct()
    {
        $this->jobRepo = new JobRepository();
    }

    public function index(): View
    {
        $jobs = $this->jobRepo->getLatestJobs();
        return view('welcome',['jobs' => $jobs]);
    }

    public function indexCategory(string $category): View
    {
        if(!in_array($category,JobCategories::cases())){
            redirect()->back()->withErrors('Incorrect category type');
        }
        $jobs = $this->jobRepo->getLatestJobsByCategory($category);
        return view('welcome',['jobs' => $jobs]);
    }

     public function indexType(string $type): View
    {
        if(!in_array($type,JobTypesEnum::cases())){
            redirect()->back()->withErrors('Incorrect job type');
        }
        $jobs = $this->jobRepo->getLatestJobsByType($type);
        return view('welcome',['jobs' => $jobs]);
    }
}
