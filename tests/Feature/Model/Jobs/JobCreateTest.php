<?php


it('internship job create page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsStudent()->get('/job/create/It');
    $response->assertRedirect('/');
});

it('internship job create page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsEmployer()->get('/job/create/It');
    $response->assertOk();
});

it('helper job create page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsStudent()->get('/job/helper-create/It');
    $response->assertRedirect('/');
});

it('helper job create page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsEmployer()->get('/job/helper-create/It');
    $response->assertOk();
});

it('internship job create page for unauthenticated user', function() {
    
    $response = $this->get('/job/create/It');
    $response->assertRedirect('/login');
});

it('helper job create page for unauthenticated user', function() {
    
    $response = $this->get('/job/helper-create/It');
    $response->assertRedirect('/login');
});

it('store intership job as unautorised user', function() {
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $student = student();
    $jobData = jobData($student->id);
    $response = $this->actingAs($student)->post(route('job.store'),$jobData);
    $response->assertRedirect('/');
});

it('store intership job as unauthenticated user', function() {

    germanLocationSeeder();
    $student = student();
    $jobData = jobData($student->id);
    $response = $this->post(route('job.store'),$jobData);
    $response->assertRedirect('/login');
});

it('store intership job as autorised user', function() {
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $jobData = jobData($employer->id);
    $response = $this->actingAs($employer)->post(route('job.store'),$jobData);
    $response->assertRedirect();
    $response->assertRedirect('/');
    $this->assertDatabaseHas('jobs',$jobData);
});

it('store helper job as unautorised user', function() {
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $student = student();
    $jobData = helperJobData($student->id);
    $response = $this->actingAs($student)->post(route('job.helper.store'),$jobData);
    $response->assertRedirect('/');
});

it('store helper job as unauthenticated user', function() {
    germanLocationSeeder();
    $student = student();
    $jobData = helperJobData($student->id);
    $response = $this->post(route('job.helper.store'),$jobData);
    $response->assertRedirect('/login');
});

it('store helper job as autorised user', function() {
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $jobData = helperJobData($employer->id);
    $response = $this->actingAs($employer)->post(route('job.helper.store'),$jobData);
    $response->assertRedirect();
    $response->assertRedirect('/');
    $this->assertDatabaseHas('jobs',$jobData);
});