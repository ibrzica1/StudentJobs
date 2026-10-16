<?php

use App\Enums\JobCategories;
use App\Models\Job;
use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('shows homepage test', function() {
    $response = $this->get(route('homepage'));
    $response->assertOk();
});

it('paginates jobs test', function() {

    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $jobs = Job::factory(['employer_id' => $employer->id])->count(16)->create();
    $lastJob = $jobs->last();
    $firstJob = $jobs->first(); 

    $response = $this->get(route('homepage'));
    $viewJobs = $response->viewData('jobs');

    expect($viewJobs->contains($firstJob))->toBeTrue();
    expect($viewJobs->contains($lastJob))->toBeFalse();
});

it('shows filtered jobs by category', function() {
     $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $jobs = Job::factory([
        'employer_id' => $employer->id,
        'category' => JobCategories::MOVING_HELPER->value,
    ]) ->count(5)->create();

    $response = $this->get(route('homepage.category',['category' => JobCategories::MOVING_HELPER->value]));
    $viewJobs = $response->viewData('jobs');
    expect($viewJobs)->toHaveCount(5);
});