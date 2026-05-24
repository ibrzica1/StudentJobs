<?php

namespace App\Repositories;

use App\Models\Location;

class LocationRepository
{
    private $locationModel;

    public function __construct()
    {
        $this->locationModel = new Location();
    }

    public function locationSearch($search)
    {
        return $this->locationModel::where('city','like','%'.$search.'%')->take(10)->get();
    }
}