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