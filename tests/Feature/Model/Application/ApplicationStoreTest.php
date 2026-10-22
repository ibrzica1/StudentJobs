<?php

use App\Enums\ApplicationAcceptStatusesEnum;
use App\Enums\ApplicationSeenStatusesEnum;
use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Support\Facades\Date;


it('store application as unautorised user', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();

    $employer = User::factory()->employer()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $applicationData = [
        'text' => "TEXT",
        'user_id' => $employer->id,
        'job_id' => $job->id,
        'accept_status' => ApplicationAcceptStatusesEnum::PENDING->value,
        'seen_status' => ApplicationSeenStatusesEnum::UNSEEN->value
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
        'accept_status' => ApplicationAcceptStatusesEnum::PENDING->value,
        'seen_status' => ApplicationSeenStatusesEnum::UNSEEN->value
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
        'accept_status' => ApplicationAcceptStatusesEnum::PENDING->value,
        'seen_status' => ApplicationSeenStatusesEnum::UNSEEN->value
    ];

    $response = $this->actingAs($student)->post(route('application.store'),$applicationData);
    $response->assertRedirect('/');

    $this->assertDatabaseHas('applications',[
        'text' => "TEXT",
        'user_id' => $student->id,
        'job_id' => $job->id,
        'accept_status' => ApplicationAcceptStatusesEnum::PENDING->value,
        'seen_status' => ApplicationSeenStatusesEnum::UNSEEN->value
    ]);
});