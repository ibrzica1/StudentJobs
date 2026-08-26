<?php

namespace Tests\Feature\Auth;

use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_employer_can_register(): void
    {
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
    }

    public function test_new_student_can_register(): void
    {
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
    }
}
