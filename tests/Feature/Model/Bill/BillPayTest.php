<?php

it('bill paid for unauthorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $employer = employer();
    $bill = bill($employer->id);
    $response = loginAsStudent()->patch('bill/'.$bill->id.'/paid');
    $response->assertRedirect('/');
});

it('bill paid for unauthanticated user', function() {
    
    germanLocationSeeder();
    $employer = employer();
    $bill = bill($employer->id);
    $response = $this->patch('bill/'.$bill->id.'/paid');
    $response->assertRedirect('/login');
});

it('bill paid for authorised user', function() {
    
    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $admin = admin();
    $bill = bill($admin->id);
    $response = $this->actingAs($admin)->patch('bill/'.$bill->id.'/paid');
    $response->assertRedirect('admin/dashboard');
});