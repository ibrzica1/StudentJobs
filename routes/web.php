<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::controller(JobController::class)->prefix('/job')->group(function() {
    Route::name('job.')->group(function() {
        Route::get('/helper-create-page','createJobHelperPage')->name('helper.create.page');
        Route::post('/helper-create','createJobHelper')->name('helper.create');
        Route::get('/create-page','createJobPage')->name('create.page');
        Route::post('/create','createJob')->name('create');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update/user-info', [ProfileController::class, 'updateUserInfo'])->name('profile.update.user-info');
    Route::patch('/profile/update/user-address', [ProfileController::class, 'updateUserAddress'])->name('profile.update.user-address');
    Route::patch('/profile/update/user-avatar', [ProfileController::class, 'updateUserAvatar'])->name('profile.update.user-avatar');
    Route::patch('/profile/update/company-logo', [CompanyController::class, 'updateLogo'])->name('profile.update.company-logo');
    Route::patch('/profile/update/company-info', [CompanyController::class, 'updateCompanyInfo'])->name('profile.update.company-info');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/company/delete/{company}', [CompanyController::class, 'deleteCompany'])->name('company.delete');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
});

require __DIR__.'/auth.php';
