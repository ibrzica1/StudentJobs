@extends('layout')

@section('pageTitle', 'Forgot Password')

@section('content')

<style>
    /* Ista CSS pravila za konzistentnost */
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

                    <h2 class="text-end fw-bold mb-4">Forgot Password</h2>
                    <hr class="mb-4">

                    <div class="mb-4 text-sm text-muted">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    @if (session('status'))
                        <div class="alert alert-info mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="{{ asset('storage/images/icons/mail.svg') }}" style="width: 20px;">
                                </span>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                                       class="form-control custom-input @error('email') is-invalid @enderror" required autofocus>
                            </div>
                            @error('email') 
                                <div class="text-danger small mt-1">{{ $message }}</div> 
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-4">
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection