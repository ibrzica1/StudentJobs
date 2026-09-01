<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EmployerCheckMiddleware;
use App\Http\Middleware\JobBelongsToUser;
use App\Http\Middleware\StudentCheckMiddleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/lenguage/{locale}', [LocalizationController::class, 'setLocale'])->name('locale.set');

Route::controller(HomepageController::class)->name('homepage')->group(function() {
    Route::get('/filter/type/{type}', 'indexType')->name('.type');
    Route::get('/filter/category/{category}', 'indexCategory')->name('.category');
    Route::get('/', 'index')->name('');
});

Route::controller(JobController::class)->prefix('/job')
->name('job.')->group(function() {
    Route::get('/helper-create/{category}','createJobHelper')
    ->middleware(['auth',EmployerCheckMiddleware::class])->name('helper.create');
    Route::post('/helper-store','storeJobHelper')
    ->middleware(['auth',EmployerCheckMiddleware::class])->name('helper.store');
    Route::get('/create/{category}','createJob')
    ->middleware(['auth',EmployerCheckMiddleware::class])->name('create');
    Route::post('/store','storeJob')
    ->middleware(['auth',EmployerCheckMiddleware::class])->name('store');
    Route::get('/show/{job}','show')->name('show');
    Route::get('/categories/{jobType}','categories')
    ->middleware(['auth',EmployerCheckMiddleware::class])->name('categories');
    Route::get('/my-ads','myAds')
    ->middleware(['auth',EmployerCheckMiddleware::class])->name('my-ads');
    Route::delete('/delete/{job}','delete')
    ->middleware(['auth',EmployerCheckMiddleware::class,JobBelongsToUser::class])->name('delete');
});

Route::controller(ProfileController::class)
->middleware('auth')->prefix('/profile')->name('profile.')->group(function() {
    Route::get('/','edit')->name('edit');
    Route::patch('/update/user-info','updateUserInfo')->name('update.user-info');
    Route::patch('/update/user-address','updateUserAddress')->name('update.user-address');
    Route::patch('/update/user-avatar','updateUserAvatar')->name('update.user-avatar');
    Route::patch('/update/user-cv','updateUserCv')->name('update.user-cv');
    Route::patch('/update/user-mobility','updateUserMobility')->name('update.user-mobility');
    Route::patch('/update/user-education','updateUserEducation')->name('update.user-education');
    Route::patch('/update/company-logo','updateLogo')->name('update.company-logo');
    Route::patch('/update/company-info','updateCompanyInfo')->name('update.company-info');
    Route::delete('/destroy','destroy')->name('destroy');
    
});

Route::controller(CompanyController::class)->middleware(['auth',EmployerCheckMiddleware::class])
->prefix('/company')->name('company.')
->group(function() {
    Route::patch('/update/company-logo','updateLogo')->name('update.company-logo');
    Route::patch('/update/company-info','updateCompanyInfo')->name('update.company-info');
    Route::delete('/delete/{company}','deleteCompany')->name('delete');
    Route::post('/store','store')->name('store');
});

Route::controller(ApplicationController::class)->prefix('/application')->name('application.')
->group(function() {
    Route::get('/create/{job}','create')
    ->middleware(['auth',StudentCheckMiddleware::class])->name('create');
});

require __DIR__.'/auth.php';
