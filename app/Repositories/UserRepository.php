<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserRolesEnum;

class UserRepository
{
    private object $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function storeEmployer(array $request): User
    {
        return $this->userModel->create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'location_id' => $request['location_id'],
            'street' => $request['street'],
            'house_number' => $request['house_number'],
            'telephone' => $request['telephone'],
            'role' => UserRolesEnum::EMPLOYER->value,
        ]);
    }

    public function storeStudent(array $request): User
    {
        $avatar = null;

        if($request['imageStudent']){
            $path = $request['imageStudent']->store('images/user_avatar','public');
            $avatar = basename($path);
        }

        return $this->userModel->create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'location_id' => $request['location_id'],
            'street' => $request['street'],
            'house_number' => $request['house_number'],
            'telephone' => $request['telephone'],
            'role' => UserRolesEnum::STUDENT->value,
            'avatar' => $avatar,
        ]);
    }

    public function updateUserInfo(int $userId, array $request)
    {
        $this->userModel->where('id',$userId)
                        ->update(['firstName' => $request['firstName'],
                                  'lastName' => $request['lastName'],
                                  'telephone' => $request['telephone']]);
    }

    public function updateUserAddress(int $userId, array $request)
    {
        $this->userModel->where('id',$userId)
                        ->update(['location_id' => $request['location_id'],
                                  'street' => $request['street'],
                                  'house_number' => $request['house_number']]);
    }

    public function updateUserCv(int $userId, string $cv)
    {
        $this->userModel->where('id',$userId)
                        ->update(['cv' => $cv]);
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