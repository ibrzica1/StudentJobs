<?php

use App\Models\Job;
use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('categories page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $student = User::factory()->student()->create();
    $response = $this->actingAs($student)->get(route('job.categories',['jobType' => Job::BABYSITTER_HELPER]));
    $response->assertRedirect('/');
});

it('categories page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $response = $this->actingAs($employer)->get(route('job.categories',['jobType' => Job::BABYSITTER_HELPER]));
    $response->assertOk();
});

it('categories page for unauthicated user', function() {
    $response = $this->get(route('job.categories',['jobType' => Job::BABYSITTER_HELPER]));
    $response->assertRedirect('/login');
});