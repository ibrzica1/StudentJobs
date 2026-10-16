<?php

namespace Database\Factories;

use App\Enums\ApplicationAcceptStatusesEnum;
use App\Enums\ApplicationSeenStatusesEnum;
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
            'accept_status' => ApplicationAcceptStatusesEnum::PENDING->value,
            'seen_status' => fake()->randomElement(ApplicationSeenStatusesEnum::cases())
        ];
    }
}
