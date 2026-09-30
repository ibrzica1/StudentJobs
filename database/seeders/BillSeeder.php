<?php

namespace Database\Seeders;

use Database\Factories\BillFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    public function run(): void
    {
        BillFactory::new()->count(10)->create();
    }
}
