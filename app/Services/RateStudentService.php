<?php

namespace App\Services;

use App\Events\RatingCreatedEvent;
use App\Repositories\RatingRepository;
use App\Repositories\UserRepository;

class RateStudentService
{
    private RatingRepository $ratingRepo;

    public function __construct()
    {
        $this->ratingRepo = new RatingRepository();
        
    }

    public function rateStudent(array $request)
    {
        $rating = $this->ratingRepo->store($request);
        event(new RatingCreatedEvent($rating->user_id));
    }
}