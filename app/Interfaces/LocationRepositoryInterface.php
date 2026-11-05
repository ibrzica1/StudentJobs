<?php

namespace App\Interfaces;

use App\Models\Location;

interface LocationRepositoryInterface
{
    public function getLocation(int $id): Location;
    public function locationSearch(string $search): object;
}