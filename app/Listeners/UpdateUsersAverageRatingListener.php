<?php

namespace App\Listeners;

use App\Events\RatingCreatedEvent;
use App\Repositories\RatingRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUsersAverageRatingListener
{
    private RatingRepository $ratingRepo;
    private UserRepository $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->ratingRepo =  new RatingRepository();
    }

    public function handle(RatingCreatedEvent $event): void
    {
        $averageRating = $this->ratingRepo->calculateAverage($event->userId);
        $this->userRepo->updateAverageRating($event->userId,$averageRating);
    }
}
