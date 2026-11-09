<?php

namespace App\Services;

use App\Interfaces\VisitRepositoryInterface;
use App\Repositories\VisitRepository;
use Carbon\Carbon;
use Illuminate\Cache\Repository;
use Illuminate\Support\Facades\Cache;

class UpdateTodayVisitsCacheService
{
    private VisitRepositoryInterface $visitRepo;
    private Repository $cache;

    public function __construct(
        VisitRepositoryInterface $visitRepositoryInterface,
        Repository $cache
    )
    {
        $this->visitRepo = $visitRepositoryInterface;
        $this->cache = $cache;
    }

    public function updateVisitCount()
    {
        $today = Carbon::now()->toDateString();
        if($this->cache->has($today)){
            $this->cache->increment($today);
        }
        else{
            $yesterday = Carbon::yesterday()->toDateString();
            if($this->cache->has($yesterday)){
                $this->visitRepo->store($yesterday,$this->cache->get($yesterday));
                $this->cache->forget($yesterday);
            }
            $this->cache->increment($today);
        }
    } 
}