<?php

use App\Models\Job;
use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('rating index as unauthenticated user', function() {

    (new GermanLocationsSeeder())->run();
    $student = User::factory()->student()->create();
    $response = $this->get(route('rating.index',['user' => $student->id]));
    $response->assertRedirect('/login');
});

it('rating index as authenticated user', function() {

    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $student = User::factory()->student()->create();
    $response = $this->actingAs($employer)->get(route('rating.index',['user' => $student->id]));
    $response->assertOk();
});