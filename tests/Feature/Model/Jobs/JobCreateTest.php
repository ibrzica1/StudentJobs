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

it('internship job create page for unauthenticated user', function() {
    
    $response = $this->get('/job/create/It');
    $response->assertRedirect('/login');
});

it('helper job create page for unauthenticated user', function() {
    
    $response = $this->get('/job/helper-create/It');
    $response->assertRedirect('/login');
});

it('store intership job as unautorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $student = User::factory()->student()->create();
    $jobData = [
        'type' => Job::JOB,
        'category' => Job::MOVING_HELPER,
        'title' => 'Helper needed',
        'employer_id' => $student->id,
        'location_id' => 4,
        'company_id' => 2,
        'wage' => 23,
        'setting_type' => Job::FULL_TIME,
        'weekly_hours' => 40,
        'start_date' => '2026-07-09',
        'duration' => Job::YEAR1,
        'description' => 'description',
        'expectation' => 'expectations',
        'offer' => 'offer',
    ];

    $response = $this->actingAs($student)->post(route('job.store'),$jobData);
    $response->assertRedirect('/');
});

it('store intership job as unauthenticated user', function() {

    (new GermanLocationsSeeder())->run();

    $student = User::factory()->student()->create();
    $jobData = [
        'type' => Job::JOB,
        'category' => Job::MOVING_HELPER,
        'title' => 'Helper needed',
        'employer_id' => $student->id,
        'location_id' => 4,
        'company_id' => 2,
        'wage' => 23,
        'setting_type' => Job::FULL_TIME,
        'weekly_hours' => 40,
        'start_date' => '2026-07-09',
        'duration' => Job::YEAR1,
        'description' => 'description',
        'expectation' => 'expectations',
        'offer' => 'offer',
    ];

    $response = $this->post(route('job.store'),$jobData);
    $response->assertRedirect('/login');
});

it('store intership job as autorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $company = Company::create([
        'name' => 'Company',
        'user_id' => $employer->id,
    ]);
    $jobData = [
        'type' => Job::JOB,
        'category' => Job::MOVING_HELPER,
        'title' => 'Helper needed',
        'employer_id' => $employer->id,
        'location_id' => 4,
        'company_id' => $company->id,
        'wage' => 23,
        'setting_type' => Job::FULL_TIME,
        'weekly_hours' => 40,
        'start_date' => Carbon::now(),
        'duration' => Job::YEAR1,
        'description' => 'description',
        'expectation' => 'expectations',
        'offer' => 'offer',
    ];

    $response = $this->actingAs($employer)->post(route('job.store'),$jobData);
    $response->assertRedirect();
    $response->assertRedirect('/');

    $this->assertDatabaseHas('jobs',[
        'type' => Job::JOB,
        'category' => Job::MOVING_HELPER,
        'title' => 'Helper needed',
        'employer_id' => $employer->id,
        'location_id' => 4,
        'company_id' => $company->id,
        'wage' => 23,
        'setting_type' => Job::FULL_TIME,
        'weekly_hours' => 40,
        'start_date' => Carbon::now(),
        'duration' => Job::YEAR1,
        'description' => 'description',
        'expectation' => 'expectations',
        'offer' => 'offer',
    ]);

    
});

it('store helper job as unautorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $student = User::factory()->student()->create();
    $jobData = [
        'type' => Job::JOB,
        'category' => Job::MOVING_HELPER,
        'title' => 'Helper needed',
        'location_id' => 4,
        'employer_id' => $student->id,
        'address' => 'Long str.',
        'employee_amount' => 2,
        'wage' => 23,
        'start_date' => Carbon::now(),
        'from' => Carbon::now()->addHour(1),
        'to' => Carbon::now()->addHour(2),
        'description' => 'description',
        'tasks' => 'tasks',
        'expectation' => 'expectations'
    ];

    $response = $this->actingAs($student)->post(route('job.helper.store'),$jobData);
    $response->assertRedirect('/');
});

it('store helper job as unauthenticated user', function() {

    (new GermanLocationsSeeder())->run();

    $student = User::factory()->student()->create();
    $jobData = [
        'type' => Job::JOB,
        'category' => Job::MOVING_HELPER,
        'title' => 'Helper needed',
        'location_id' => 4,
        'employer_id' => $student->id,
        'address' => 'Long str.',
        'employee_amount' => 2,
        'wage' => 23,
        'start_date' => Carbon::now(),
        'from' => Carbon::now()->addHour(1),
        'to' => Carbon::now()->addHour(2),
        'description' => 'description',
        'tasks' => 'tasks',
        'expectation' => 'expectations',
    ];

    $response = $this->post(route('job.helper.store'),$jobData);
    $response->assertRedirect('/login');
});

it('store helper job as autorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    
    $jobData = [
         'type' => Job::HELPER_JOB,
        'category' => Job::MOVING_HELPER,
        'title' => 'Helper needed',
        'location_id' => 4,
        'employer_id' => $employer->id,
        'address' => 'Long str.',
        'employee_amount' => 2,
        'wage' => 23,
        'start_date' => Carbon::now(),
        'from' => Carbon::now()->addHour(1)->format('H:i'),
        'to' => Carbon::now()->addHour(2)->format('H:i'),
        'description' => 'description',
        'tasks' => 'tasks',
        'expectation' => 'expectations',
    ];

    $response = $this->actingAs($employer)->post(route('job.helper.store'),$jobData);
    $response->assertRedirect();
    $response->assertRedirect('/');

    $this->assertDatabaseHas('jobs',[
        'type' => Job::HELPER_JOB,
        'category' => Job::MOVING_HELPER,
        'title' => 'Helper needed',
        'location_id' => 4,
        'employer_id' => $employer->id,
        'address' => 'Long str.',
        'employee_amount' => 2,
        'wage' => 23,
        'start_date' => Carbon::now(),
        'from' => Carbon::now()->addHour(1)->format('H:i'),
        'to' => Carbon::now()->addHour(2)->format('H:i'),
        'description' => 'description',
        'tasks' => 'tasks',
        'expectation' => 'expectations',
    ]);

    
});