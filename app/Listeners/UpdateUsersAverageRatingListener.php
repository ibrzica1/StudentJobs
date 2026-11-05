<?php

namespace App\Listeners;

use App\Events\BlacklistUserEvent;
use App\Events\RatingCreatedEvent;
use App\Interfaces\RatingRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\RatingRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUsersAverageRatingListener
{
    private RatingRepositoryInterface $ratingRepo;
    private UserRepositoryInterface $userRepo;

    public function __construct(
        RatingRepositoryInterface $ratingRepositoryInterface,
        UserRepositoryInterface $userRepositoryInterface
    )
    {
        $this->userRepo = $userRepositoryInterface;
        $this->ratingRepo = $ratingRepositoryInterface;
    }

    public function handle(RatingCreatedEvent $event): void
    {
        $averageRating = $this->ratingRepo->calculateAverage($event->user);
        $user = $this->userRepo->updateAverageRating($event->user,$averageRating);
        if($user->average_rating < 2 && $user->ratings->count() >= 5){
            event(new BlacklistUserEvent($user));
        }
    }
}
