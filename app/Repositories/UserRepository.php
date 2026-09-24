<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    private object $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function updateAverageRating(int $userId, float $averageRating)
    {
        $this->userModel->where('id',$userId)
                        ->update(['average_rating' => $averageRating]);
    }
}