@extends("layout")

@section("pageTitle")
    My Applications
@endsection

@section("content")
    <?php 
        use Carbon\Carbon;
        use App\Services\TimeService;
        use App\Models\Job;
        use App\Models\Application;
        use App\Models\User;
        $time = new TimeService();
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

    <div>
        <h6 class="text-uppercase text-muted fw-bold mt-3 mb-3 mx-4 my-5">
            {{__('myApplication.My Applications')}}
        </h6>

        
    </div>
    

    @if ($applications->isEmpty())
        <div class="container">
            <div class="bg-white rounded shadow p-5 text-center">
                <img src="{{ asset('storage/images/icons/no-data.png') }}"
                    class="d-block mx-auto mb-4"
                    width="80"
                    height="80"
                    style="object-fit: cover;">
                <h3 class="fw-bold mb-2">{{__('myApplications.You havent created any applications yet, but its about time!')}}</h3>
                <p class="text-muted mb-4">{{__('myApplications.Start by viewing our job listings.')}}</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{route('homepage')}}" class="btn btn-danger px-4 py-2">
                        {{__('myAds.Homepage')}}
                    </a>
                </div>
            </div>
        </div>
    @else
       @foreach ($applications as $application)
        <div class="container mx-6 my-4 bg-white rounded shadow overflow-hidden">
            
            <div class="d-flex pt-2 column-gap-3 align-items-center">
                <div class="d-flex column-gap-3 flex-grow-1 text-decoration-none text-dark">
                    <div class="col-3">
                        @if ($application->job->company === null)
                            <img src="{{ asset('storage/images/company_logo/default.png') }}"
                            class="rounded-circle shadow-sm mb-3 d-block mx-auto"
                            width="50"
                            height="50"
                            style="object-fit: cover;">
                        @else
                            <img src="{{ asset('storage/images/company_logo/'.$job->company->logo) }}"
                            class="rounded-circle shadow-sm mb-3 d-block mx-auto"
                            width="50"
                            height="50"
                            style="object-fit: cover;">
                        @endif
                        <div class="text-center text-muted small">
                            {{ __('homepage.Published') }} {{$time->calculateTime($application->job->created_at)}}
                        </div>
                    </div>

                    <div class="col">
                        <h3 class="text-danger fw-bold my-2">
                            {{$application->job->title}}
                        </h3>
                        <div class="d-flex justify-content-between column-gap-4">

                            <div class="m-2 column-gap-3">
                                <div class="d-flex column-gap-2 mb-2">
                                    <img src="{{ asset('storage/images/icons/location.svg') }}" style="width: 20px;">
                                    <p>{{$application->job->location->city}}</p>
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
                            <div>
                                <div class="d-flex m-2 column-gap-3">
                                    <img src="{{ asset('storage/images/icons/calendar.svg') }}" style="width: 20px;">
                                    <div class="fw-bold text-center">{{Carbon::parse($application->job->start_date)->dayOfMonth}}</div>
                                    <div class="fw-bold text-center">{{Carbon::parse($application->job->start_date)->format('F')}}</div>
                                    <div class="text-center">{{Carbon::parse($application->job->start_date)->year}}</div>
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
                            

                            <div>
                                <h1 class="h1">{{$application->job->wage}}</h1>
                                <p>e{{ __('homepage.euro per hour') }}</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center gap-2 ms-3">
                    <a href="{{ route('job.show',['job' => $application->job->id]) }}" 
                        class="btn btn-success btn-sm">
                            {{__('myApplication.VIEW JOB')}}
                    </a>
                    <form action="{{route('application.delete',['application' => $application->id])}}" method="post" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            {{__('profile.DELETE')}}
                        </button>
                    </form>
                </div>
            </div>
            @if ($application->accept_status === Application::PENDING)
                <div class="d-flex align-items-center justify-content-around p-3"
                    style="background-color: blanchedalmond;">
                    <p style="color:chocolate; font-weight:bold">{{__('myApplication.PENDING')}}</p>
                </div>
            @elseif ($application->accept_status === Application::APPROVED)
                <div class="d-flex align-items-center justify-content-around p-3"
                style="background-color:#d4edda;">
                    <p style="color:#155724; font-weight:bold">{{__('myApplication.APPROVED')}}</p>
                </div>
            @elseif ($application->accept_status === Application::REJECTED)
                <div class="d-flex align-items-center justify-content-around p-3"
                style="background-color: #f8d7da;">
                    <p style="color:#721c24; font-weight:bold">{{__('myApplication.REJECTED')}}</p>
                </div>
            @endif
        </div>
    @endforeach
    @endif
   
@endsection