<?php

it('check if its not employer', function () {

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsStudent()->get('/job/helper-create/It');
    $response->assertRedirect('/');
});

it('check if its employer', function () {

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsEmployer()->get('/job/helper-create/It');
    $response->assertOk();
});