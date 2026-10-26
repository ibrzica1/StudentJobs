<?php


it('job edit page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $student = student();
    $job = job($student->id);
    $response = $this->actingAs($student)->get(route('job.edit',$job->id));
    $response->assertRedirect('/');
});

it('job edit page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    $response = $this->actingAs($employer)->get(route('job.edit',$job->id));
    $response->assertOk();
});

it('job edit page for unauthenticated user', function() {
    
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    $response = $this->get(route('job.edit',$job->id));
    $response->assertRedirect('/login');
});

it('job update has no errors', function() {

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $job = job($employer->id);
    $jobData = jobData($employer->id);
    $response = $this->actingAs($employer)
                     ->patch('/job/update/' .$job->id,$jobData);
    $response->assertSessionHasNoErrors()
             ->assertRedirect('/job/my-ads/all');
});