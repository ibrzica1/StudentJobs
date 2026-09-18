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

it('store application as unautorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $applicationData = [
        'text' => "TEXT",
        'user_id' => $employer->id,
        'job_id' => $job->id,
        'accept_status' => Application::PENDING,
        'seen_status' => Application::UNSEEN
    ];

    $response = $this->actingAs($employer)->post(route('application.store'),$applicationData);
    $response->assertRedirect('/');
});

it('store application as unauthenticated user', function() {
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $applicationData = [
        'text' => "TEXT",
        'user_id' => $employer->id,
        'job_id' => $job->id,
        'accept_status' => Application::PENDING,
        'seen_status' => Application::UNSEEN
    ];

    $response = $this->post(route('application.store'),$applicationData);
    $response->assertRedirect('/login');
});

it('store application as authorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $student = User::factory()->student()->create();
    $employer = User::factory()->employer()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $applicationData = [
        'text' => "TEXT",
        'user_id' => $student->id,
        'job_id' => $job->id,
        'accept_status' => Application::PENDING,
        'seen_status' => Application::UNSEEN
    ];

    $response = $this->actingAs($student)->post(route('application.store'),$applicationData);
    $response->assertRedirect('/');

    $this->assertDatabaseHas('applications',[
        'text' => "TEXT",
        'user_id' => $student->id,
        'job_id' => $job->id,
        'accept_status' => Application::PENDING,
        'seen_status' => Application::UNSEEN
    ]);
});