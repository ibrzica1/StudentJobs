<?php

namespace App\Repositories;

use App\Models\Rating;
use App\Models\User;

class RatingRepository
{
    private object $ratingModel;

    public function __construct()
    {
        $this->ratingModel = new Rating();
    }

    public function store(array $request): Rating
    {
        return $rating = $this->ratingModel->create($request);
    }

    public function calculateAverage(User $user): float
    {
        $sumOfRatings = $this->ratingModel->where('user_id',$user->id)
                                          ->sum('score');
        $countRatings = $this->ratingModel->where('user_id',$user->id)
                                          ->count();
        return $sumOfRatings / $countRatings;
    }
}