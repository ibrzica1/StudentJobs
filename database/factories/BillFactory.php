<?php

namespace Database\Factories;

use App\Enums\BillStatusesEnum;
use App\Enums\UserRolesEnum;
use App\Models\Bill;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class BillFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(User::where('role',UserRolesEnum::EMPLOYER->value)->pluck('id')),
            'job_id' => fake()->randomElement(Job::pluck('id')),
            'amount' => fake()->numberBetween(20,80),
            'staus' => BillStatusesEnum::UNPAYED->value
        ];
    }
}
