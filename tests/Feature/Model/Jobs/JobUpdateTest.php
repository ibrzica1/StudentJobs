<?php

use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Date;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('job edit page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $student->id])->create();
    $response = $this->actingAs($student)->get(route('job.edit',$job->id));
    $response->assertRedirect('/');
});

it('job edit page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $company = Company::factory(['user_id' => $employer->id])->create();
    $job = Job::factory(['employer_id' => $employer->id, 'company_id' => $company->id])->create();
    $response = $this->actingAs($employer)->get(route('job.edit',$job->id));
    $response->assertOk();
});

it('job edit page for unauthenticated user', function() {
    
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $company = Company::factory(['user_id' => $employer->id])->create();
    $job = Job::factory(['employer_id' => $employer->id, 'company_id' => $company->id])->create();
    $response = $this->get(route('job.edit',$job->id));
    $response->assertRedirect('/login');
});

it('job update has no errors', function() {

    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $company = Company::factory(['user_id' => $employer->id])->create();
    $job = Job::factory(['employer_id' => $employer->id, 'company_id' => $company->id])->create();
    $response = $this->actingAs($employer)
                     ->patch('/job/update/' .$job->id,[
                        'type' => Job::JOB,
                        'category' => Job::IT_HELPER,
                        'title' => 'TITLE',
                        'employer_id' => $employer->id,
                        'location_id' => 4,
                        'company_id' => $company->id,
                        'wage' => 20,
                        'setting_type' => Job::ALLOWED_SETTING_TYPES[0],
                        'weekly_hours' => 20,
                        'start_date' => fake()->dateTimeBetween('now','+1 month')->format('Y-m-d'),
                        'duration' => fake()->randomElement(Job::ALLOWED_DURATION_TYPES),
                        'description' => 'DESCRIPTION',
                        'expectation' => 'EXPECTATIONS',
                        'offer' => 'OFFER',
                     ]);
    $response->assertSessionHasNoErrors()
             ->assertRedirect('/job/my-ads');
});