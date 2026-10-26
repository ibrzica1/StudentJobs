<?php

use App\Mail\JobCreatedMail;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

it('can send welcome email', function() {
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    Mail::fake();
    Mail::send(new WelcomeEmail($employer));
    Mail::assertSent(WelcomeEmail::class);
    Mail::assertSent(WelcomeEmail::class, function ($mail) {
        return $mail->hasFrom('noreply@studentjobs.test');
    });
});

it('can send job created email', function() {
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    Mail::fake();
    Mail::send(new JobCreatedMail($job));
    Mail::assertSent(JobCreatedMail::class);
    Mail::assertSent(JobCreatedMail::class, function ($mail) {
        return $mail->hasFrom('noreply@studentjobs.test');
    });
});
