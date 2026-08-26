<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can run migrations', function () {
    expect(true)->toBeTrue();
});