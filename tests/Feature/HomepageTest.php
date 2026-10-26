<?php
use App\Enums\JobCategories;

it('shows homepage test', function() {
    $response = $this->get(route('homepage'));
    $response->assertOk();
});

it('paginates jobs test', function() {

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $jobs = jobs($employer->id);
    $lastJob = $jobs->last();
    $firstJob = $jobs->first(); 
    $response = $this->get(route('homepage'));
    $viewJobs = $response->viewData('jobs');
    expect($viewJobs->contains($firstJob))->toBeTrue();
    expect($viewJobs->contains($lastJob))->toBeFalse();
});

it('shows filtered jobs by category', function() {
     $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    createFiveJobs($employer->id);
    $response = $this->get(route('homepage.category',['category' => JobCategories::MOVING_HELPER->value]));
    $viewJobs = $response->viewData('jobs');
    expect($viewJobs)->toHaveCount(5);
});