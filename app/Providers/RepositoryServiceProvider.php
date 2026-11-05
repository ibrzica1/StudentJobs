<?php

namespace App\Providers;

use App\Interfaces\CompanyRepositoryInterface;
use App\Interfaces\JobRepositoryInterface;
use App\Repositories\CompanyRepository;
use App\Repositories\JobRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
