<?php

namespace App\Repositories;

use App\Models\Rating;

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

    public function calculateAverage(int $userId): float
    {
        $sumOfRatings = $this->ratingModel->where('user_id',$userId)
                                          ->sum('score');
        $countRatings = $this->ratingModel->where('user_id',$userId)
                                          ->count();
        return $sumOfRatings / $countRatings;
    }
}