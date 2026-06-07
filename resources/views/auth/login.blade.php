@extends('layout')

@section('pageTitle', 'Login')

@section('content')

<style>
    /* Isti stil kao kod registracije za potpunu konzistentnost */
    .custom-input {
        border: 1px solid #f00505 !important;
    }
    .custom-input:focus {
        box-shadow: 0 0 0 0.25rem rgba(240, 5, 5, 0.25);
    }
    .input-group-text {
        background-color: #fff;
        border: 1px solid #f00505;
        border-right: none;
    }
</style>

<div class="container-fluid bg-light py-5 min-vh-100 d-flex align-items-center">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-4">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-5">

                    <h2 class="text-end fw-bold mb-4">Log in</h2>
                    <hr class="mb-4">

                    @if (session('status'))
                        <div class="alert alert-info mb-4">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="{{ asset('storage/images/icons/mail.svg') }}" style="width: 20px;">
                                </span>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                                       class="form-control custom-input @error('email') is-invalid @enderror" required autofocus>
                            </div>
                            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="{{ asset('storage/images/icons/password.svg') }}" style="width: 20px;">
                                </span>
                                <input type="password" id="password" name="password" 
                                       class="form-control custom-input @error('password') is-invalid @enderror" required>
                            </div>
                            @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">Remember me</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none small text-muted">
                                    Forgot password?
                                </a>
                            @endif

                            <button type="submit" class="btn btn-primary btn-lg px-4">Log in</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection