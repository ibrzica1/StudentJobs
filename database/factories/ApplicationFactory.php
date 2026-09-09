<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{

    public function definition(): array
    {
        return [
            'text' => fake()->text(20),
            'user_id' => fake()->randomElement(User::pluck('id')),
            'job_id' => fake()->randomElement(Job::pluck('id')),
            'accept_status' => Application::PENDING,
            'seen_status' => fake()->randomElement(Application::ALLOWED_SEEN_STATUSES)
        ];
    }
}
