<?php

namespace App\Providers;

use App\Interfaces\ApplicationRepositoryInterface;
use App\Interfaces\BillRepositoryInterface;
use App\Interfaces\CompanyRepositoryInterface;
use App\Interfaces\JobRepositoryInterface;
use App\Interfaces\LocationRepositoryInterface;
use App\Interfaces\RatingRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\VisitRepositoryInterface;
use App\Repositories\ApplicationRepository;
use App\Repositories\BillRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\JobRepository;
use App\Repositories\LocationRepository;
use App\Repositories\RatingRepository;
use App\Repositories\UserRepository;
use App\Repositories\VisitRepository;
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
        $this->app->bind(ApplicationRepositoryInterface::class, ApplicationRepository::class);
        $this->app->bind(BillRepositoryInterface::class, BillRepository::class);
        $this->app->bind(RatingRepositoryInterface::class, RatingRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(VisitRepositoryInterface::class, VisitRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
