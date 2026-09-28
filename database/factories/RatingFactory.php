<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
  
    public function definition(): array
    {
        return [
            'score' => 1,
            'comment' => fake()->text(20),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'job_id' => fake()->randomElement(Job::pluck('id')),
        ];
    }
}
