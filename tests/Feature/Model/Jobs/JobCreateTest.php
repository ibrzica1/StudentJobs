<?php

use App\Models\Job;
use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('internship job create page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $student = User::factory()->student()->create();
    $response = $this->actingAs($student)->get('/job/create/It');
    $response->assertRedirect('/');
});

it('internship job create page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $response = $this->actingAs($employer)->get('/job/create/It');
    $response->assertOk();
});

it('helper job create page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $student = User::factory()->student()->create();
    $response = $this->actingAs($student)->get('/job/helper-create/It');
    $response->assertRedirect('/');
});

it('helper job create page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $response = $this->actingAs($employer)->get('/job/helper-create/It');
    $response->assertOk();
});