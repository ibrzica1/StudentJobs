<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function createJobHelperPage()
    {
        return view("jobCreate");
    }

    public function createJobHelper()
    {
        
    }
}
