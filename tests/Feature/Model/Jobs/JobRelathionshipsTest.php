<?php

use App\Models\Job;
use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;

it('employer relathionship', function () {
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    expect($job->employer_id)->toBe($employer->id);
});

