<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProfileTest extends TestCase
{

    public function test_profile_page_is_displayed(): void
    {
        $this->withoutExceptionHandling();
        germanLocationSeeder();
        $student = student();
        $response = $this
            ->actingAs($student)
            ->get('/profile');
        $response->assertOk();
    }

    public function test_user_informations_can_be_updated(): void
    {
        $this->withoutExceptionHandling();
        germanLocationSeeder();
        $student = student();
        $response = $this
            ->actingAs($student)
            ->patch('/profile/update/user-info', userInformationData());

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $student->refresh();

        $this->assertSame('Name', $student->firstName);
        $this->assertSame('Surname', $student->lastName);
        $this->assertSame('2234556777', $student->telephone);
    }

    public function test_user_address_can_be_updated(): void
    {
        $this->withoutExceptionHandling();
        germanLocationSeeder();
        $user = user();

        $response = $this
            ->actingAs($user)
            ->patch('/profile/update/user-address', userAddressData());

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
        germanLocationSeeder();
        $user = user();
        $file = createFile('cv.pdf');

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
        germanLocationSeeder();
        $user = user();
        $file = createFile('profile.jpg');

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
        germanLocationSeeder();
        $user = user();

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
        germanLocationSeeder();
        $user = user();

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
        germanLocationSeeder();
        $user = user();

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
        germanLocationSeeder();
        $user = user();

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
