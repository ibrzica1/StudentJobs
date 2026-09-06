<?php

use App\Mail\JobCreatedMail;
use App\Mail\WelcomeEmail;
use App\Models\Job;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

uses(TestCase::class, RefreshDatabase::class);

it('can send welcome email', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();

    Mail::fake();
    Mail::send(new WelcomeEmail($employer));
    Mail::assertSent(WelcomeEmail::class);
    Mail::assertSent(WelcomeEmail::class, function ($mail) {
        return $mail->hasFrom('noreply@studentjobs.test');
    });
});

it('can send job created email', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $job = Job::factory(['employer_id' => $employer->id])->create();
    Mail::fake();
    Mail::send(new JobCreatedMail($job));
    Mail::assertSent(JobCreatedMail::class);
    Mail::assertSent(JobCreatedMail::class, function ($mail) {
        return $mail->hasFrom('noreply@studentjobs.test');
    });
});
