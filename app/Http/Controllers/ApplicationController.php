<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function create(Job $job): View
    {
        $job->load('location','company','employer');
        $user = Auth::user();
        return view('applicationCreate',['job' => $job],['user' => $user]);
    }
}
