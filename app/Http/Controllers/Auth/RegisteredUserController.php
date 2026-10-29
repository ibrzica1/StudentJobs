<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreatedEvent;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    private UserRepository $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }
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
     * Store an Employer and company if its entered
     */
    public function storeEmployer(StoreEmployerRequest $request): RedirectResponse
    {

        DB::transaction(function () use ($request) {

            $user = $this->userRepo->storeEmployer($request->validated());

            if($request->companyName !== null){
                $companyRepository = new CompanyRepository();
                $companyRepository->store($request->validated(), $user->id);
            }

            event(new Registered($user));

            Auth::login($user);

        });
        return redirect(route('homepage', absolute: false));
    }

    /**
     * Store an Student
     */
    public function storeStudent(StoreStudentRequest $request): RedirectResponse
    {
        $user = $this->userRepo->storeStudent($request->validated());
        event(new Registered($user));
        event(new UserCreatedEvent($user));
        Auth::login($user);

        return redirect(route('homepage', absolute: false));
    }
}
