<?php

namespace Database\Factories;

use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitFactory extends Factory
{

    public function definition(): array
    {
        return [
            'date' => Carbon::now(),
            'count' => fake()->numberBetween(2,200)
        ];
    }
}
