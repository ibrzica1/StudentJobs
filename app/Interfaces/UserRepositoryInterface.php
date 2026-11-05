<?php

namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function storeEmployer(array $request): User;
    public function storeStudent(array $request): User;
    public function updateUserInfo(int $userId, array $request): void;
    public function updateUserAddress(int $userId, array $request): void;
    public function updateUserCv(int $userId, string $cv): void;
    public function updateUserAvatar(int $userId, string $avatar): void;
    public function updateUserEducation(int $userId, array $request): void;
    public function updateUserMobility(int $userId, array $request): void;
    public function updateAverageRating(User $user, float $averageRating): User;
    public function updateBlacklisted(int $userId, bool $value): void;
    
}