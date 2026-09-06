<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'name' => fake()->text(10),
            'user_id' => User::factory()->employer()->create()->id,
        ];
    }
}
