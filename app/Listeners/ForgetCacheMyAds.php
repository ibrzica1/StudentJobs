<?php

namespace App\Listeners;

use App\Events\JobCreatedEvent;
use App\Events\JobDeletedEvent;
use Illuminate\Support\Facades\Cache;

class ForgetCacheMyAds
{

    public function handleCache(): void
    {
        Cache::forget('my_ads');
    }

    public function subscribe($events): array
    {
        return [
            JobCreatedEvent::class => "handleCache",
            JobDeletedEvent::class => "handleCache",
        ];
    }
}
