<?php


it('application index page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    $response = loginAsStudent()->get('application/job/'.$job->id.'/applications');
    $response->assertRedirect('/');
});

it('application index page for unauthanticated user', function() {
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    $response = $this->get('application/job/'.$job->id.'/applications');
    $response->assertRedirect('/login');
});

it('application index page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    $response = $this->actingAs($employer)->get('application/job/'.$job->id.'/applications');
    $response->assertOk();
});