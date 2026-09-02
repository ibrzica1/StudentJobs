<?php

namespace App\Repositories;

use App\Models\Location;

class LocationRepository
{
    private object $locationModel;

    public function __construct()
    {
        $this->locationModel = new Location();
    }

    public function getLocation(int $id): Location
    {
        return $this->locationModel::where('id',$id)->first();
    }

    public function locationSearch(string $search): object
    {
        return $this->locationModel::where('city','like','%'.$search.'%')->take(10)->get();
    }
}