<?php


it('store rating as unauthenticated user', function() {

    germanLocationSeeder();
    $employer = employer();
    $student = student();
    $job = job($employer->id);
    $ratingData = ratingData($student->id,$job->id);
    $response = $this->post(route('rating.store'),$ratingData);
    $response->assertRedirect('/login');
});

it('store rating as anauthorised user', function() {

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $student = student();
    $job = job($employer->id);
    $ratingData = ratingData($student->id,$job->id);
    $response = $this->actingAs($student)->post(route('rating.store'),$ratingData);
    $response->assertRedirect('/');
});

it('store rating as authorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $student = student();
    $job = job($employer->id);
    $ratingData = ratingData($student->id,$job->id);
    $response = $this->actingAs($employer)->post(route('rating.store'),$ratingData);
    $response->assertRedirect('/job/my-ads/all');
    $this->assertDatabaseHas('ratings',$ratingData);
});