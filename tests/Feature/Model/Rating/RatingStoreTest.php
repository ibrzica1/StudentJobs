<?php

use App\Models\Job;
use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('store rating as unauthenticated user', function() {

    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $ratingData = [
        'score' => 3,
        'comment' => 'KOMENT',
        'user_id' => $student->id,
        'job_id' => $job->id,
    ];
    $response = $this->post(route('rating.store'),$ratingData);
    $response->assertRedirect('/login');
});

it('store rating as anauthorised user', function() {

    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $ratingData = [
        'score' => 3,
        'comment' => 'KOMENT',
        'user_id' => $student->id,
        'job_id' => $job->id,
    ];
    $response = $this->actingAs($student)->post(route('rating.store'),$ratingData);
    $response->assertRedirect('/');
});

it('store rating as authorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    $ratingData = [
        'score' => 3,
        'comment' => 'KOMENT',
        'user_id' => $student->id,
        'job_id' => $job->id,
    ];
    $response = $this->actingAs($employer)->post(route('rating.store'),$ratingData);
    $response->assertRedirect('/job/my-ads/all');
    $this->assertDatabaseHas('ratings',[
        'score' => 3,
        'comment' => 'KOMENT',
        'user_id' => $student->id,
        'job_id' => $job->id,
    ]);
});