<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileAddressUpdateRequest;
use App\Http\Requests\ProfileAvatarUpdateRequest;
use App\Http\Requests\ProfileCvUpdateRequest;
use App\Http\Requests\ProfileEducationUpdateRequest;
use App\Http\Requests\ProfileInfoUpdateRequest;
use App\Http\Requests\ProfileMobilityUpdateRequest;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use App\Services\StoreFileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private CompanyRepository $companyRepo;
    private UserRepository $userRepo;
    private StoreFileService $storeFileService;

    public function __construct()
    {
        $this->companyRepo = new CompanyRepository();
        $this->userRepo = new UserRepository();
        $this->storeFileService = new StoreFileService();
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $companies = $this->companyRepo->getUserCompanies($request->user()->id);
        return view('profile.profile', [
            'user' => $request->user(),
            'companies' => $companies,
        ]);
    }

    /**
     * Update the user's info information.
     */
    public function updateUserInfo(ProfileInfoUpdateRequest $request): RedirectResponse
    {
        $this->userRepo->updateUserInfo($request->user()->id(),$request->validated());
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's address information.
     */
    public function updateUserAddress(ProfileAddressUpdateRequest $request): RedirectResponse
    {
        $this->userRepo->updateUserAddress($request->user()->id(),$request->validated());
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

     /**
     * Update the user's cv.
     */
    public function updateUserCv(ProfileCvUpdateRequest $request): RedirectResponse
    {
        $cv = $this->storeFileService->storeCv($request->user()->cv,$request->validated());
        $this->userRepo->updateUserCv($request->user()->id(),$cv);
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

     /**
     * Update the user's avatar information.
     */
    public function updateUserAvatar(ProfileAvatarUpdateRequest $request): RedirectResponse
    {
        $avatar = $this->storeFileService->storeAvatar($request->user()->profile_picture, $request->validated());
        $this->userRepo->updateUserAvatar($request->user()->id(),$avatar);
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateUserEducation(ProfileEducationUpdateRequest $request): RedirectResponse
    {
        $this->userRepo->updateUserEducation($request->user()->id(),$request->validated());
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

     /**
     * Update the user's mobility information.
     */
    public function updateUserMobility(ProfileMobilityUpdateRequest $request): RedirectResponse
    {
        $this->userRepo->updateUserMobility($request->user()->id(),$request->validated());
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
