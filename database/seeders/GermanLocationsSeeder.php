<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GermanLocationsSeeder extends Seeder
{
    /**
     * I downloaded json with german locations,
     * then created seeder that will put city names in the 
     * locations table
     */
    public function run(): void
    {
        $json = File::get(storage_path('app/German-locations.json'));

        $cities = json_decode($json,true);

        foreach($cities as $city)
        {
            Location::create([
                'city' => $city['name']
            ]);
        }
    }
}
