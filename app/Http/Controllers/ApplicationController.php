<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateApplicationRequest;
use App\Models\Job;
use App\Repositories\ApplicationRepository;
use App\Repositories\JobRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    private $applicationRepo;

    public function __construct()
    {
        $this->applicationRepo = new ApplicationRepository();
    }

    public function index(Job $job): View
    {
        $applications = $this->applicationRepo->getJobApplications($job);
        return view('applicationIndex',['applications' => $applications, 'job' => $job]);
    }

    public function create(Job $job): View
    {
        $job->load('location','company','employer');
        $user = Auth::user();
        return view('applicationCreate',['job' => $job],['user' => $user]);
    }

    public function store(CreateApplicationRequest $request): RedirectResponse
    {
        $this->applicationRepo->store($request->validated());
        return redirect()->route('homepage');
    }
}
