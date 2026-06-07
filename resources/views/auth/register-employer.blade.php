@extends('layout')

@section('pageTitle', 'Register Student')

@section('content')

<style>
    /* Prilagođeni border za inpute */
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

<div class="container-fluid bg-light py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-5">

                    <h2 class="text-end fw-bold mb-4">
                        New Account / <span class="text-primary">Employer</span>
                    </h2>
                    <hr class="mb-4">

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <h6 class="text-uppercase text-muted fw-bold mt-3 mb-3">Account Information</h6>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('storage/images/icons/mail.svg') }}" style="width: 20px;"></span>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                                       class="form-control custom-input @error('email') is-invalid @enderror" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><img src="{{ asset('storage/images/icons/password.svg') }}" style="width: 20px;"></span>
                                    <input type="password" id="password" name="password" class="form-control custom-input" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirm</label>
                                <div class="input-group">
                                    <span class="input-group-text"><img src="{{ asset('storage/images/icons/password.svg') }}" style="width: 20px;"></span>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control custom-input" required>
                                </div>
                            </div>
                        </div>

                        <h6 class="text-uppercase text-muted fw-bold mt-4 mb-3">Personal Details</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><img src="{{ asset('storage/images/icons/usr-info.svg') }}" style="width: 20px;"></span>
                                    <input type="text" id="firstName" name="firstName" class="form-control custom-input" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><img src="{{ asset('storage/images/icons/usr-info.svg') }}" style="width: 20px;"></span>
                                    <input type="text" id="lastName" name="lastName" class="form-control custom-input" required>
                                </div>
                            </div>
                        </div>

                        <h6 class="text-uppercase text-muted fw-bold mt-4 mb-3">COMPANY DATA</h6>
                        <div class="mb-4">
                            <label for="imageCompany" class="form-label">Company Logo (optional)</label>
                            <input type="file" name="imageCompany" id="imageCompany" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('storage/images/icons/company.svg') }}" style="width: 20px;"></span>
                                <input type="text" id="companyName" name="companyName" class="form-control custom-input" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <livewire:location-search />
                        </div>

                        <div class="mb-4">
                            <label for="telephone" class="form-label">Telephone Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('storage/images/icons/telephone.svg') }}" style="width: 20px;"></span>
                                <input type="tel" name="telephone" id="telephone" class="form-control custom-input">
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success btn-lg w-100 py-3 shadow-sm">
                                CREATE ACCOUNT
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection