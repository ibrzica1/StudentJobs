<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company','location')->latest('created_at')->paginate();
        
        return view('welcome',['jobs' => $jobs]);
    }
}
