@extends('layout')

@section('pageTitle')
    Register
@endsection

@section('content')

<div class="container-fluid bg-light min-vh-100 d-flex justify-content-center align-items-center py-5">

    <div class="bg-white shadow rounded-4 p-5 my-1" style="min-width: 450px;">

        <div class="text-end mb-5">
            <h1 class="fw-bold mb-3">
                Create account
            </h1>
        </div>

        <div class="text-start mb-5">
            <h3 class="text-muted fw-normal">
                Register or
                <span class="text-primary fw-semibold">
                    <a href="{{route('login')}}">
                        Log in now
                    </a>
                </span>
            </h3>
        </div>

        <a href="{{route('register.student')}}" class="btn btn-outline-danger btn-lg w-100 py-3 shadow-sm">
            FOR STUDENTS
        </a>

        <div class="text-center my-4 fw-bold text-muted">
            OR
        </div>

        <a href="{{route('register.employer')}}" class="btn btn-outline-success btn-lg w-100 py-3 shadow-sm">
            FOR EMPLOYERS
        </a>

    </div>

</div>

@endsection