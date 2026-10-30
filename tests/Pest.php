<?php
use App\Models\User;
use App\Models\Job;
use Database\Seeders\GermanLocationsSeeder;
use App\Enums\LocalizationEnum;
use App\Enums\ApplicationAcceptStatusesEnum;
use App\Enums\ApplicationSeenStatusesEnum;
use App\Enums\JobCategories;
use App\Enums\JobDurationTypesEnum;
use App\Enums\JobSettingTypesEnum;
use App\Enums\JobStatusesEnum;
use App\Enums\JobTypesEnum;
use App\Models\Application;
use App\Models\Bill;
use App\Models\Company;
use Database\Factories\CompanyFactory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
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

function admin()
{
    return User::factory()->admin()->create();
}

function user()
{
    return User::factory()->create();
}

function loginAsStudent()
{
    return test()->actingAs(User::factory()->student()->create());
}

function loginAsEmployer()
{
    return test()->actingAs(User::factory()->employer()->create());
}

function loginAsAdmin()
{
    return test()->actingAs(User::factory()->admin()->create());
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

function application(?int $userId = null, ?int $jobId = null)
{
    $attributes = [];

    if ($userId !== null) {
        $attributes['user_id'] = $userId;
    }

    if ($jobId !== null) {
        $attributes['job_id'] = $jobId;
    }

    return Application::factory($attributes)->test()->create();
}

function companyData(int $employerId)
{
    return [
        'imageCompany' => UploadedFile::fake()->create('company.jpg',500),
        'companyName' => 'Company',
        'user_id' => $employerId,
    ];
}

function jobData(int $employerId)
{
    return [
        'status' => JobStatusesEnum::ACTIVE->value,
        'type' => JobTypesEnum::JOB->value,
        'category' => JobCategories::MOVING_HELPER->value,
        'title' => 'Helper needed',
        'employer_id' => $employerId,
        'location_id' => 4,
        'company_id' => Company::factory()->create(['user_id' => $employerId])->id,
        'wage' => 23,
        'setting_type' => JobSettingTypesEnum::FULL_TIME->value,
        'weekly_hours' => 40,
        'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
        'duration' => JobDurationTypesEnum::YEAR1->value,
        'description' => 'description',
        'expectation' => 'expectations',
        'offer' => 'offer',
    ];
}

function helperJobData(int $employerId)
{
    return [
        'status' => JobStatusesEnum::ACTIVE->value,
        'type' => JobTypesEnum::HELPER_JOB->value,
        'category' => JobCategories::MOVING_HELPER->value,
        'title' => 'Helper needed',
        'location_id' => 4,
        'employer_id' => $employerId,
        'address' => 'Long str.',
        'employee_amount' => 2,
        'wage' => 23,
        'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
        'from' => Carbon::now()->addHour(1)->format('H:i'),
        'to' => Carbon::now()->addHour(2)->format('H:i'),
        'description' => 'description',
        'tasks' => 'tasks',
        'expectation' => 'expectations',
    ];
}

function ratingData(int $studentId, int $jobId)
{
    return [
        'score' => 3,
        'comment' => 'KOMENT',
        'user_id' => $studentId,
        'job_id' => $jobId,
    ];
}

function jobs(int $employerId)
{
    return Job::factory(['employer_id' => $employerId])->count(16)->create();
}

function createFiveJobs(int $employerId)
{
    Job::factory([
        'employer_id' => $employerId,
        'category' => JobCategories::MOVING_HELPER->value,
    ]) ->count(5)->create();
}

function getLocale()
{
    return App::getLocale();
}

function getRandomNewLocale(string $locale)
{
    return array_rand(array_filter(LocalizationEnum::cases(), fn($item) => $item != $locale));
}

function userInformationData()
{
   return [
            'firstName' => 'Name',
            'lastName' => 'Surname',
            'telephone' => '2234556777',
        ];
}

function userAddressData()
{
    return [
            'location_id' => 4,
            'street' => 'long str',
            'house_number' => '44',
        ];
}

function createFile(string $name)
{
    return UploadedFile::fake()->create($name,500);
}

function bills(int $employerId)
{
    return Bill::factory(['user_id' => $employerId])->test()->count(10)->create();
}

function bill(int $employerId)
{
    return Bill::factory(['user_id' => $employerId])->test()->create();
}
