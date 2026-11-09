<?php

namespace App\Listeners;

use App\Events\JobCreatedEvent;
use App\Events\JobDeletedEvent;
use Illuminate\Cache\Repository;
use Illuminate\Support\Facades\Cache;

class ForgetCacheMyAds
{
    protected Repository $cache;

    public function __construct(Repository $cache)
    {
        $this->cache = $cache;
    }

    public function handleCache(): void
    {
        $this->cache->forget('my_ads');
    }

    public function subscribe($events): array
    {
        return [
            JobCreatedEvent::class => "handleCache",
            JobDeletedEvent::class => "handleCache",
        ];
    }
}
