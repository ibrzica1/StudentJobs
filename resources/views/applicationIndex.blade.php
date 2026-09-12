@extends("layout")

@section("pageTitle", "Application Index")

@section("content")
<?php 
use App\Models\User;
use App\Models\Application;
?>
<style>
    .custom-tooltip {
    position: relative;
    display: inline-flex;
}

.custom-tooltip-text {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    bottom: 125%;
    left: 50%;
    transform: translateX(-50%);
    background-color: #2985ab;
    color: #fff;
    text-align: center;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
    white-space: nowrap;
    z-index: 10;
    transition: opacity 0.15s ease;
}

.custom-tooltip-text::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    border-width: 5px;
    border-style: solid;
    border-color: #2985ab transparent transparent transparent;
}

.custom-tooltip:hover .custom-tooltip-text {
    visibility: visible;
    opacity: 1;
}
</style>
<body class="bg-body-secondary">

@if($errors->any())
    <div class="alert alert-danger text-center">{{$errors->first()}}</div>
@endif

<div class="container py-5">

    {{-- Job header --}}
    <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
        <p class="text-uppercase text-muted fw-bold small mb-1">{{__('applications.Job')}}</p>
        <h2 class="fw-bold text-danger mb-0">{{$job->title}}</h2>
    </div>

    <h5 class="text-uppercase text-muted fw-bold mb-3">
        {{__('applications.Applications')}} <span class="badge bg-danger rounded-pill">{{$applications->count()}}</span>
    </h5>

    @if ($applications->isEmpty())
        <div class="bg-white rounded-4 shadow-sm p-5 text-center">
            <img src="{{ asset('storage/images/icons/no-data.png') }}" width="70" class="mb-3">
            <h5 class="fw-bold">{{__('applications.No applications yet')}}</h5>
            <p class="text-muted mb-0">{{__('applications.Check back later to see who applied.')}}</p>
        </div>
    @else
        @foreach ($applications as $application)
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="row g-4 align-items-center">

                        {{-- Avatar --}}
                        <div class="col-auto">
                            @if ($application->user->profile_picture)
                                <img src="{{asset('storage/images/user_avatar/'.$application->user->profile_picture)}}"
                                    class="rounded-circle shadow-sm"
                                    width="100"
                                    height="100"
                                    style="object-fit: cover; !important; height: 100px !important; width: 100px !important; max-width: 100px !important; max-height: 100px !important; min-width: 100px !important; min-height: 100px !important;">
                            @else
                                <img src="{{asset('storage/images/user_avatar/avatar-default.png')}}"
                                    class="rounded-circle shadow-sm"
                                    width="100"
                                    height="100"
                                    style="object-fit: cover; !important; height: 100px !important; width: 100px !important; max-width: 100px !important; max-height: 100px !important; min-width: 100px !important; min-height: 100px !important;">
                            @endif
                        </div>

                        {{-- Applicant info --}}
                        <div class="col">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <h5 class="fw-bold mb-0">
                                    {{$application->user->firstName}} {{$application->user->lastName}}
                                </h5>
                                <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle">
                                    ★ 1 {{__('applications.review')}}
                                    <a href="" class="text-decoration-none ms-1">{{__('applications.show')}}</a>
                                </span>
                            </div>

                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2 text-muted small mb-2">
                                        <img src="{{ asset('storage/images/icons/location.svg') }}" width="16">
                                        {{$application->user->location->city}}
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-muted small">
                                        <img src="{{ asset('storage/images/icons/telephone.svg') }}" width="16">
                                        @if ($application->accept_status === Application::APPROVED)
                                            {{$application->user->telephone}}
                                        @else
                                            {{User::hideTelephone($application->user->telephone)}}
                                            <span class="custom-tooltip">
                                                <img src="{{ asset('storage/images/icons/info.png') }}" width="12" style="cursor: pointer;">
                                                <span class="custom-tooltip-text">{{__('applications.You will only see the applicants full')}}<br>
                                                    {{__('applications.telephone number after you have accepted')}} <br>
                                                    {{__('applications.their offer.')}}</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2 text-muted small mb-2">
                                        <img src="{{ asset('storage/images/icons/university.svg') }}" width="16">
                                        {{$application->user->university}}
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-muted small">
                                        <img src="{{ asset('storage/images/icons/mail.svg') }}" width="16">
                                        @if ($application->accept_status === Application::APPROVED)
                                            {{$application->user->email}}
                                        @else
                                            {{User::hideMail($application->user->email)}}
                                            <span class="custom-tooltip">
                                                <img src="{{ asset('storage/images/icons/info.png') }}" width="12" style="cursor: pointer;">
                                                <span class="custom-tooltip-text">{{__('applications.You will only see the applicants full')}}<br>
                                                    {{__('applications.email after you have accepted')}} <br>
                                                    {{__('applications.their offer.')}}</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="col-12 col-lg-auto">
                            <div class="d-flex justify-content-around flex-lg-column gap-2">
                               <livewire:popup-application :application="$application"/>

                                <button class="btn btn-success btn-sm">
                                    ✓ {{__('applications.Accept')}}
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    ✕ {{__('applications.Reject')}}
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    @endif

</div>

@endsection