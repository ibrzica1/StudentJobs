<?php

use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Date;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('application index page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $response = $this->actingAs($student)->get('application/job/'.$job->id.'/applications');
    $response->assertRedirect('/');
});

it('application index page for unauthanticated user', function() {
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $response = $this->get('application/job/'.$job->id.'/applications');
    $response->assertRedirect('/login');
});

it('application index page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $response = $this->actingAs($employer)->get('application/job/'.$job->id.'/applications');
    $response->assertOk();
});