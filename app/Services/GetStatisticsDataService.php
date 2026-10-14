<?php

namespace App\Services;

use App\Repositories\JobRepository;
use App\Repositories\VisitRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class GetStatisticsDataService
{
    private VisitRepository $visitRepo;
    private JobRepository $jobRepo;

    public function __construct()
    {
        $this->visitRepo = new VisitRepository();
        $this->jobRepo = new JobRepository();
    }

    public function getData(): array
    {
        $todayVisits = Cache::get(Carbon::now()->toDateString());
        $thisMonthVisits = $this->visitRepo->getThisMonthsVisits();
        $totalVisits = $this->visitRepo->getTotalVisits();
        $thisMonthJobs = $this->jobRepo->getThisMonthsJobCount();
        $todayJobs = $this->jobRepo->getTodaysJobCount();
        $data = [
            'todayVisits' => $todayVisits,
            'thisMonthVisits' => $thisMonthVisits,
            'totalVisits' => $totalVisits,
            'thisMonthJobs' => $thisMonthJobs,
            'todayJobs' => $todayJobs
        ];
        return $data;
    }
}