<?php

namespace App\Repositories;

use App\Models\Job;

class JobRepository
{
    private $jobModel;

    public function __construct()
    {
       $this->jobModel = new Job();
    }
}