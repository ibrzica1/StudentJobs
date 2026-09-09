<?php

namespace Database\Seeders;

use Database\Factories\ApplicationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApplicationFactory::new([
            'user_id' => 122,
            'job_id' => 33
        ])->count(10)->create();
    }
}
