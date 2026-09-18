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

it('update accept application as unautorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $application = Application::factory(['user_id' => $student->id,'job_id' => $job->id])->create();

    $response = $this->actingAs($student)->patch("application/update/accept/".$application->id);
    $response->assertRedirect('/');
});

it('update reject application as unautorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $application = Application::factory(['user_id' => $student->id,'job_id' => $job->id])->create();

    $response = $this->actingAs($student)->patch("application/update/reject/".$application->id);
    $response->assertRedirect('/');
});

it('update accept application as unauthicated user', function() {
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $application = Application::factory(['user_id' => $student->id,'job_id' => $job->id])->create();

    $response = $this->patch("application/update/accept/".$application->id);
    $response->assertRedirect('/login');
});

it('update reject application as unauthicated user', function() {
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $application = Application::factory(['user_id' => $student->id,'job_id' => $job->id])->create();

    $response = $this->patch("application/update/reject/".$application->id);
    $response->assertRedirect('/login');
});

it('update accept application as authorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $application = Application::factory(['user_id' => $student->id,'job_id' => $job->id])->create();

    $response = $this->actingAs($employer)->patch("application/update/accept/".$application->id);
    $response->assertSessionHasNoErrors()
             ->assertRedirect(route('application.index',['job' => $application->job_id]));

    $this->assertDatabaseHas('applications',[
        'accept_status' => Application::APPROVED,
    ]);
});

it('update reject application as authorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $application = Application::factory(['user_id' => $student->id,'job_id' => $job->id])->create();

    $response = $this->actingAs($employer)->patch("application/update/reject/".$application->id);
    $response->assertSessionHasNoErrors()
             ->assertRedirect(route('application.index',['job' => $application->job_id]));
    
    $this->assertDatabaseHas('applications',[
        'accept_status' => Application::REJECTED,
    ]);
});