<?php

it('check if its not student', function () {

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsEmployer()->get('/application/my-applications');
    $response->assertRedirect('/');
});

it('check if its student', function () {

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsStudent()->get('/application/my-applications');
    $response->assertOk();
});