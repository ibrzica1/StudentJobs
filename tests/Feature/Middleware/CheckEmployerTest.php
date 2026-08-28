<?php

use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(TestCase::class, RefreshDatabase::class);

it('check if its employer', function () {

    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $user = User::factory()->student()->create();

    $response =  $this->actingAs($user)->get('/job/helper-create/It');
    $response->assertRedirect('/');
});