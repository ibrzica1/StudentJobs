<?php

use App\Enums\JobCategories;


it('categories page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsStudent()->get(route('job.categories',['jobType' => JobCategories::BABYSITTER_HELPER->value]));
    $response->assertRedirect('/');
});

it('categories page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsEmployer()->get(route('job.categories',['jobType' => JobCategories::BABYSITTER_HELPER->value]));
    $response->assertOk();
});

it('categories page for unauthicated user', function() {
    $response = $this->get(route('job.categories',['jobType' => JobCategories::BABYSITTER_HELPER->value]));
    $response->assertRedirect('/login');
});