<?php

namespace App\Interfaces;

use App\Models\Rating;
use App\Models\User;

interface RatingRepositoryInterface
{
    public function store(array $request): Rating;
    public function calculateAverage(User $user): float;
}