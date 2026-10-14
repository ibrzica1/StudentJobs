<?php

namespace Database\Seeders;

use Carbon\CarbonPeriod;
use Database\Factories\VisitFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitSeeder extends Seeder
{
  
    public function run(): void
    {
        $period = CarbonPeriod::create(now()->startOfMonth(), now())->toArray();
        foreach($period as $day){
            VisitFactory::new(['date' => $day])->create();
        }
    }
}
