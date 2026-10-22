<?php

use Database\Seeders\GermanLocationsSeeder;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new employer can register', function () {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    
    $response = $this->post('store/employer', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'firstName' => 'Name',
        'lastName' => 'Surname',
        'location_id' => '1',
        'street' => 'Long str.',
        'house_number' => '22',
        'telephone' => '333466643',
        'role' => 'employer',
        'companyName' => 'Company',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('homepage', absolute: false));
});

test('new student can register', function () {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    
    $response = $this->post('store/student', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'firstName' => 'Name',
        'lastName' => 'Surname',
        'location_id' => '1',
        'street' => 'Long str.',
        'house_number' => '22',
        'telephone' => '333466643',
        'role' => 'student',
        'profile_picture' => 'avatar',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('homepage', absolute: false));
});