<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'type' => Job::JOB,
            'title' => fake()->text(20),
            'employer_id' => User::factory(),
            'location_id' => fake()->randomElement(Location::pluck('id')),
            'company_id' => null,
            'address' => null,
            'setting_type' => fake()->randomElement(Job::ALLOWED_SETTING_TYPES),
            'weekly_hours' => fake()->numberBetween(10,50),
            'employee_amount' => 1,
            'wage' => fake()->numberBetween(13,29),
            'start_date' => fake()->dateTimeBetween('now','+1 month'),
            'from' => null,
            'to' => null,
            'duration' => fake()->randomElement(Job::ALLOWED_DURATION_TYPES),
            'urgent' => false,
            'description' => fake()->text(50),
            'tasks' => null,
            'expectation' => fake()->text(50),
            'offer' => fake()->text(50),
        ];
    }

    public function helperJob()
    {
        return $this->state(function ($array, $attributes) {
            return [
                'type' => Job::HELPER_JOB,
                'title' => fake()->text(20),
                'employer_id' => User::factory(),
                'location_id' => fake()->randomElement(Location::pluck('id')),
                'company_id' => null,
                'address' => fake()->streetAddress(),
                'setting_type' => null,
                'weekly_hours' => null,
                'employee_amount' => fake()->numberBetween(1,3),
                'wage' => fake()->numberBetween(13,29),
                'start_date' => fake()->dateTimeBetween('now','+1 month'),
                'from' => date('H:i:s', rand(1,43200)),
                'to' => date('H:i:s', rand(43201,86400)),
                'duration' => null,
                'urgent' => false,
                'description' => fake()->text(50),
                'tasks' => fake()->text(50),
                'expectation' => fake()->text(50),
                'offer' => null,
            ];
        });
    }
}
