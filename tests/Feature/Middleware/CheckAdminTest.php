<?php

it('check if its not admin', function () {

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsEmployer()->get('/admin/dashboard');
    $response->assertRedirect('/');
});

it('check if its admin', function () {

    $this->withoutExceptionHandling();
    germanLocationSeeder();
    $response = loginAsAdmin()->get('/admin/dashboard');
    $response->assertOk();
});