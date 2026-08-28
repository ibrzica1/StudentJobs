<?php

use App\Models\Job;
use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(TestCase::class, RefreshDatabase::class);

it('employer relathionship', function () {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $user = User::factory()->employer()->create();
    $job = Job::factory()->create(['employer_id' => $user->id]);

    expect($job->employer_id)->toBe($user->id);
});

