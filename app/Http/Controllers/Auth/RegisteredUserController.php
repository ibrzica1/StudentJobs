<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Http\Requests\StoreEmployerRequest;
use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Display the registration employer view.
     */
    public function createEmployer(): View
    {
        return view('auth.register-employer');
    }

     /**
     * Display the registration student view.
     */
    public function createStudent(): View
    {
        return view('auth.register-student');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function storeEmployer(StoreEmployerRequest $request): RedirectResponse
    {

        DB::transaction(function () use ($request) {

            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'location_id' => $request->location_id,
                'telephone' => $request->telephone,
                'role' => 'employer',
            ]);

            if($request->companyName !== null){
                $companyRepository = new CompanyRepository();
                $companyRepository->store($request, $user->id);
            }

            event(new Registered($user));

            Auth::login($user);

        });
        return redirect(route('dashboard', absolute: false));
    }
}
