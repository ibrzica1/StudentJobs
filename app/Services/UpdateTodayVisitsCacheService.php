<?php

namespace App\Services;

use App\Interfaces\VisitRepositoryInterface;
use App\Repositories\VisitRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class UpdateTodayVisitsCacheService
{
    private VisitRepositoryInterface $visitRepo;

    public function __construct(VisitRepositoryInterface $visitRepositoryInterface)
    {
        $this->visitRepo = $visitRepositoryInterface;
    }

    public function updateVisitCount()
    {
        $today = Carbon::now()->toDateString();
        if(Cache::has($today)){
            Cache::increment($today);
        }
        else{
            $yesterday = Carbon::yesterday()->toDateString();
            if(Cache::has($yesterday)){
                $this->visitRepo->store($yesterday,Cache::get($yesterday));
                Cache::forget($yesterday);
            }
            Cache::increment($today);
        }
    } 
}