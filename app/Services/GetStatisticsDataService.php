<?php

namespace App\Services;

use App\Interfaces\JobRepositoryInterface;
use App\Interfaces\VisitRepositoryInterface;
use App\Repositories\JobRepository;
use App\Repositories\VisitRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class GetStatisticsDataService
{
    private VisitRepositoryInterface $visitRepo;
    private JobRepositoryInterface $jobRepo;

    public function __construct(
        VisitRepositoryInterface $visitRepositoryInterface,
        JobRepositoryInterface $jobRepositoryInterface
    )
    {
        $this->visitRepo = $visitRepositoryInterface;
        $this->jobRepo = $jobRepositoryInterface;
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