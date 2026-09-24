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
}