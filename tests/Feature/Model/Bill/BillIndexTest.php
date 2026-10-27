<?php

it('bill index page for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    bills($employer->id);
    $response = loginAsStudent()->get('bill/index');
    $response->assertRedirect('/');
});

it('bill index page for unauthanticated user', function() {
    
    germanLocationSeeder();
    $employer = employer();
    bills($employer->id);
    $response = $this->get('bill/index');
    $response->assertRedirect('/login');
});

it('bill index page for authorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    bills($employer->id);
    $response = $this->actingAs($employer)->get('bill/index');
    $response->assertOk();
});