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

it('application create page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $response = $this->actingAs($employer)->get('/application/create/'.$job->id);
    $response->assertRedirect('/');
});

it('application create page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $response = $this->actingAs($student)->get('/application/create/'.$job->id);
    $response->assertOk();
});

it('application create page for unauthenticated user', function() {
    
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $response = $this->get('/application/create/'.$job->id);
    $response->assertRedirect('/login');
});

it('store application as unautorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $applicationData = [
        'text' => 'text',
        'user_id' => $employer->id,
        'job_id' => $job->id,
        'accept_status' => Application::PENDING,
        'seen_status' => Application::UNSEEN
    ];

    $response = $this->actingAs($employer)->post(route('application.store'),$applicationData);
    $response->assertRedirect('/');
});

it('store application as autorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $applicationData = [
        'text' => 'text',
        'user_id' => $student->id,
        'job_id' => $job->id,
        'accept_status' => Application::PENDING,
        'seen_status' => Application::UNSEEN
    ];

    $response = $this->actingAs($student)->post(route('application.store'),$applicationData);
    $response->assertRedirect('/');

    $this->assertDatabaseHas('applications',[
        'text' => 'text',
        'user_id' => $student->id,
        'job_id' => $job->id,
        'accept_status' => Application::PENDING,
        'seen_status' => Application::UNSEEN
    ]);
});