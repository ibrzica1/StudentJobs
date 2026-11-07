<?php

namespace App\Providers;

use App\Interfaces\StoreFileInterface;
use App\Listeners\ForgetCacheMyAds;
use App\Models\Job;
use App\Models\User;
use App\Repositories\ApplicationRepository;
use App\Repositories\JobRepository;
use App\Services\StoreFileService;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StoreFileInterface::class, StoreFileService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::subscribe(ForgetCacheMyAds::class);
        Gate::define('can-apply', function(User $user, Job $job) {
            $appRepo = new ApplicationRepository();
            return $appRepo->applicationDoesntExist($job);
        });
    }
}
