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

    public function updateAverageRating(User $user, float $averageRating): User
    {
        $user->update(['average_rating' => $averageRating]);
        return $user;
    }

    public function updateBlacklisted(int $userId, bool $value)
    {
        $this->userModel->where('id',$userId)
                        ->update(['blacklisted' => $value]);
    }
}