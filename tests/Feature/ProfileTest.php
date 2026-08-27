<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $this->withoutExceptionHandling();
        (new GermanLocationsSeeder())->run();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/profile');

        $response->assertOk();
    }

    public function test_user_informations_can_be_updated(): void
    {
        $this->withoutExceptionHandling();
        (new GermanLocationsSeeder())->run();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile/update/user-info', [
                'firstName' => 'Name',
                'lastName' => 'Surname',
                'telephone' => '2234556777',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $user->refresh();

        $this->assertSame('Name', $user->firstName);
        $this->assertSame('Surname', $user->lastName);
        $this->assertSame('2234556777', $user->telephone);
    }

    public function test_user_address_can_be_updated(): void
    {
        $this->withoutExceptionHandling();
        (new GermanLocationsSeeder())->run();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile/update/user-address', [
                'location_id' => 4,
                'street' => 'long str',
                'house_number' => '44',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $user->refresh();

        $this->assertSame(4, $user->location_id);
        $this->assertSame('long str', $user->street);
        $this->assertSame('44', $user->house_number);
    }

    public function test_user_CV_can_be_updated(): void
    {
        $this->withoutExceptionHandling();
        (new GermanLocationsSeeder())->run();
        $user = User::factory()->create();
        $file = UploadedFile::fake()->create('cv.pdf',500);

        $response = $this
            ->actingAs($user)
            ->patch('/profile/update/user-cv', [
                'cv' => $file,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

    }

    public function test_user_avatar_can_be_updated(): void
    {
        $this->withoutExceptionHandling();
        (new GermanLocationsSeeder())->run();
        $user = User::factory()->create();
        $file = UploadedFile::fake()->create('profile.jpg',500);

        $response = $this
            ->actingAs($user)
            ->patch('/profile/update/user-avatar', [
                'profilePicture' => $file,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

    }

    public function test_user_mobility_can_be_updated(): void
    {
        $this->withoutExceptionHandling();
        (new GermanLocationsSeeder())->run();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile/update/user-mobility', [
                'car_licence' => true,
                'car_available' => false,
                'truck_licence' => true,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $this->assertSame(true, $user->car_licence);
        $this->assertSame(false, $user->car_available);
        $this->assertSame(true, $user->truck_licence);
    }

    public function test_user_education_can_be_updated(): void
    {
        $this->withoutExceptionHandling();
        (new GermanLocationsSeeder())->run();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile/update/user-education', [
                'university' => 'university',
                'certificates' => 'certificates',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $this->assertSame('university', $user->university);
        $this->assertSame('certificates', $user->certificates);
    }

    public function test_user_can_delete_their_account(): void
    {
        (new GermanLocationsSeeder())->run();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete('/profile/destroy', [
                'password' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        (new GermanLocationsSeeder())->run();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->delete('/profile/destroy', [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('userDeletion', 'password')
            ->assertRedirect('/profile');

        $this->assertNotNull($user->fresh());
    }
}
