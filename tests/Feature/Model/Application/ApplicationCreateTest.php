<?php

it('application create page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    $response = $this->actingAs($employer)->get('/application/create/'.$job->id);
    $response->assertRedirect('/');
});

it('application create page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    $response = loginAsStudent()->get('/application/create/'.$job->id);
    $response->assertOk();
});

it('application create page for unauthenticated user', function() {
    
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    $response = $this->get('/application/create/'.$job->id);
    $response->assertRedirect('/login');
});

it('store application as unautorised user', function() {
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    $response = $this->actingAs($employer)->post(route('application.store'),applicationData($employer->id,$job->id));
    $response->assertRedirect('/');
});

it('store application as autorised user', function() {
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $student = student();
    $job = job($employer->id);
    $applicationData = applicationData($student->id,$job->id);

    $response = $this->actingAs($student)->post(route('application.store'),$applicationData);
    $response->assertRedirect('/');

    $this->assertDatabaseHas('applications',$applicationData);
});