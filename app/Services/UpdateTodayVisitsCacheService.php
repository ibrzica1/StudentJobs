<?php

namespace App\Services;

use App\Repositories\VisitRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class UpdateTodayVisitsCacheService
{
    private VisitRepository $visitRepo;

    public function __construct()
    {
        $this->visitRepo = new VisitRepository();
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