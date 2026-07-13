<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileAddressUpdateRequest;
use App\Http\Requests\ProfileAvatarUpdateRequest;
use App\Http\Requests\ProfileEducationUpdateRequest;
use App\Http\Requests\ProfileInfoUpdateRequest;
use App\Http\Requests\ProfileMobilityUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $companies = Company::where('user_id',$request->user()->id)->get();
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
        $request->user()->fill($request->validated());

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's address information.
     */
    public function updateUserAddress(ProfileAddressUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

     /**
     * Update the user's avatar information.
     */
    public function updateUserAvatar(ProfileAvatarUpdateRequest $request): RedirectResponse
    {
        Storage::disk('public')->delete('images/user_avatar/'. $request->user()->profile_picture);
        $path = $request->profilePicture->store('images/user_avatar','public');
        $avatar = basename($path);
        $request->user()->fill(['profile_picture' => $avatar,]);
        
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateUserEducation(ProfileEducationUpdateRequest $request): RedirectResponse
    {
        $request->user()->update([
            'university' => $request['university'],
            'certificates' => $request['certificates'],
        ]);
        
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

     /**
     * Update the user's mobility information.
     */
    public function updateUserMobility(ProfileMobilityUpdateRequest $request): RedirectResponse
    {
        $request->user()->update([
            'car_licence' => $request['car_licence'],
            'car_available' => $request['car_available'],
            'truck_licence' => $request['truck_licence'],
        ]);
        
        $request->user()->save();

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
