<?php


it('rating index as unauthenticated user', function() {

    germanLocationSeeder();
    $student = student();
    $response = $this->get(route('rating.index',['user' => $student->id]));
    $response->assertRedirect('/login');
});

it('rating index as authenticated user', function() {

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $student = student();
    $response = loginAsEmployer()->get(route('rating.index',['user' => $student->id]));
    $response->assertOk();
});