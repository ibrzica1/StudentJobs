<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobRepository
{
    private $jobModel;

    public function __construct()
    {
       $this->jobModel = new Job();
    }

    public function createNew($request)
    {
        $job = $this->jobModel->create([
            'title' => $request['title'],
            'employer_id' => Auth::id(),
            'location_id' => $request['location_id'],
            'address' => $request['address'],
            'employee_amount' => $request['employee_amount'],
            'wage' => $request['wage'],
            'start_date' => $request['start_date'],
            'from' => $request['from'],
            'to' => $request['to'],
            'description' => $request['description'],
            'tasks' => $request['tasks'],
            'expectetion' => $request['expectetion'],
        ]);

        return $job;
    }
}