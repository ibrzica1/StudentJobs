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
            'status' => BillStatusesEnum::UNPAYED->value,
            'bill_number' => fake()->text(10),
        ];
    }

    public function test(): static
    {
         return $this->state(fn (array $attributes) => [
            'user_id' => User::factory()->employer()->create()->id,
            'job_id' => Job::factory()->create()->id,
        ]);
    }
}
