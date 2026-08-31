<?php

use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Database\Seeders\GermanLocationsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('can store the company', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $file = UploadedFile::fake()->create('company.jpg',500);
    $companyData = [
        'imageCompany' => $file,
        'companyName' => 'Company',
        'user_id' => $employer->id,
    ];

    $response = $this->actingAs($employer)->post(route('company.store'), $companyData);
    $response->assertRedirect(route('profile.edit'));
    $this->assertDatabaseHas('companies',[
        'name' => 'Company',
        'user_id' => $employer->id,
    ]);
});

it('can delete the company', function() {
    $this->withoutExceptionHandling();
    (new GermanLocationsSeeder())->run();
    $employer = User::factory()->employer()->create();
    $file = UploadedFile::fake()->create('company.jpg',500);
    $company = Company::create([
        'logo' => $file,
        'name' => 'Company',
        'user_id' => $employer->id,
    ]);

    $this->assertDatabaseHas('companies',['id' => $company->id]);
    $response = $this->actingAs($employer)->delete(route('company.delete', $company->id));
    $response->assertRedirect(route('profile.edit'));
    $this->assertDatabaseMissing('companies',['id' => $company->id]);
});