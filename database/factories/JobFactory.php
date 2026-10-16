<?php

namespace Database\Factories;

use App\Enums\JobCategories;
use App\Enums\JobDurationTypesEnum;
use App\Enums\JobSettingTypesEnum;
use App\Enums\JobStatusesEnum;
use App\Enums\JobTypesEnum;
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
            'status' => JobStatusesEnum::ACTIVE->value,
            'type' => JobTypesEnum::JOB->value,
            'category' => fake()->randomElement(JobCategories::cases()),
            'title' => fake()->text(20),
            'employer_id' => User::factory()->employer()->create()->id,
            'location_id' => fake()->randomElement(Location::pluck('id')),
            'company_id' => null,
            'address' => null,
            'setting_type' => fake()->randomElement(JobSettingTypesEnum::cases()),
            'weekly_hours' => fake()->numberBetween(10,50),
            'employee_amount' => 1,
            'wage' => fake()->numberBetween(13,29),
            'start_date' => fake()->dateTimeBetween('now','+1 month'),
            'from' => null,
            'to' => null,
            'duration' => fake()->randomElement(JobDurationTypesEnum::cases()),
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
                'status' => JobStatusesEnum::ACTIVE->value,
                'type' => JobTypesEnum::HELPER_JOB->value,
                'category' => fake()->randomElement(JobCategories::cases()),
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
