<?php

namespace App\Services;

use App\Events\RatingCreatedEvent;
use App\Interfaces\RatingRepositoryInterface;
use App\Repositories\RatingRepository;
use App\Repositories\UserRepository;

class RateStudentService
{
    private RatingRepositoryInterface $ratingRepo;

    public function __construct(RatingRepositoryInterface $ratingRepositoryInterface)
    {
        $this->ratingRepo = $ratingRepositoryInterface;
        
    }

    public function rateStudent(array $request)
    {
        $rating = $this->ratingRepo->store($request);
        event(new RatingCreatedEvent($rating->user));
    }
}