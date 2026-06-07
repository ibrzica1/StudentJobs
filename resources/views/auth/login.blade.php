@extends('layout')

@section('pageTitle')
    Login
@endsection

@section('content')

<div class="container-fluid bg-light min-vh-100 d-flex justify-content-center align-items-center py-5">
    
    <div class="bg-white shadow rounded-4 p-5 my-1" style="min-width: 450px;">

        <div class="text-end mb-4">
            <h1 class="fw-bold mb-3">Log in</h1>
        </div>

        @if (session('status'))
            <div class="alert alert-info mb-4">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                       class="form-control @error('email') is-invalid @enderror" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" 
                       class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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

                <button type="submit" class="btn btn-primary btn-lg px-5">Log in</button>
            </div>
        </form>

    </div>
</div>

@endsection