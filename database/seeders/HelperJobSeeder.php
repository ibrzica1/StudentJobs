<?php

namespace Database\Seeders;

use Database\Factories\HelperJobFactory;
use Database\Factories\JobFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HelperJobSeeder extends Seeder
{
    
    public function run(): void
    {
        JobFactory::new()->helperJob()->count(10)->create();
    }
}
