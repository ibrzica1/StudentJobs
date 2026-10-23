<?php
use App\Models\User;
use App\Models\Job;
use Database\Seeders\GermanLocationsSeeder;
use App\Enums\ApplicationAcceptStatusesEnum;
use App\Enums\ApplicationSeenStatusesEnum;
/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

pest()->extend(Tests\TestCase::class)
     //->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function germanLocationSeeder()
{
    return (new GermanLocationsSeeder())->run();
}

function student()
{
    return User::factory()->student()->create();
}

function employer()
{
    return User::factory()->employer()->create();
}

function loginAsStudent()
{
    return test()->actingAs(User::factory()->student()->create());
}

function loginAsEmployer()
{
    return test()->actingAs(User::factory()->employer()->create());
}

function job(int $employerId)
{
    return Job::factory(['employer_id' => $employerId])->create();
}

function applicationData(int $studentId, int $jobId)
{
   return [ 'text' => 'text',
            'user_id' => $studentId,
            'job_id' => $jobId,
            'accept_status' => ApplicationAcceptStatusesEnum::PENDING->value,
            'seen_status' => ApplicationSeenStatusesEnum::UNSEEN->value];
}

