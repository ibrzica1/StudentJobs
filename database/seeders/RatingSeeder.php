<?php

namespace Database\Seeders;

use Database\Factories\RatingFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
  
    public function run(): void
    {
        RatingFactory::new()->count(100)->create();
    }
}
