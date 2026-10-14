<?php

namespace App\Repositories;

use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class VisitRepository
{
    private object $visitModel;

    public function __construct()
    {
        $this->visitModel = new Visit();
    }

    public function getThisMonthsVisits(): int
    {
        $thisMonth = $this->visitModel
                        ->whereYear('date',Carbon::now()->year)
                        ->whereMonth('date',Carbon::now()->month)
                        ->sum('count');
                
        $today = Cache::get(Carbon::now()->toDateString());
        return $thisMonth += $today;
    }

    public function getTotalVisits(): int
    {
        $totalVisits = $this->visitModel->sum('count');
        $todayVisits = Cache::get(Carbon::now()->toDateString());
        return $totalVisits += $todayVisits;
    }

    public function store(string $date, int $count): void
    {
        $this->visitModel->create([
            'date' => $date,
            'count' => $count
        ]);
    }
}