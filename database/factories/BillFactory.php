<?php

namespace Database\Factories;

use App\Models\Bill;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class BillFactory extends Factory
{
   
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(User::where('role',User::EMPLOYER)->pluck('id')),
            'job_id' => fake()->randomElement(Job::pluck('id')),
            'amount' => fake()->numberBetween(20,80),
            'staus' => Bill::UNPAYED
        ];
    }
}
