<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function view()
    {
        $jobs = Job::all();
    }
}
