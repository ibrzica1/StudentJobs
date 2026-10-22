<?php

use App\Enums\JobCategories;
use App\Models\Job;
use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;


it('categories page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $student = User::factory()->student()->create();
    $response = $this->actingAs($student)->get(route('job.categories',['jobType' => JobCategories::BABYSITTER_HELPER->value]));
    $response->assertRedirect('/');
});

it('categories page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $response = $this->actingAs($employer)->get(route('job.categories',['jobType' => JobCategories::BABYSITTER_HELPER->value]));
    $response->assertOk();
});

it('categories page for unauthicated user', function() {
    $response = $this->get(route('job.categories',['jobType' => JobCategories::BABYSITTER_HELPER->value]));
    $response->assertRedirect('/login');
});