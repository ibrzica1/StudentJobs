@extends("layout")

@section("pageTitle", "Application Create")

@section("content")
<?php 
    use Carbon\Carbon;
    use App\Services\TimeService;
    $time = new TimeService();

?>
<body class="bg-body-secondary">
<div class="container p-5">


<div class="container row bg-white p-2 rounded shadow h-100 mw-75">
     <div class="col-lg-4 d-flex align-items-center">
         @if ($job->company === null)
            <img src="{{ asset('storage/images/company_logo/default.png') }}"
            class="rounded-circle shadow-sm mb-3 d-block mx-auto"
            width="80"
            height="80"
            style="object-fit: cover;">
        @else
            <img src="{{ asset('storage/images/company_logo/'.$job->company->logo) }}"
            class="rounded-circle shadow-sm mb-3 d-block mx-auto"
            width="80"
            height="80"
            style="object-fit: cover;">
        @endif
    </div>

    @if ($job->type === 'job')
    <div class="col-lg-8 ">
        <div class="p-2 bg-white justify-content-between 
        column-gap-2">
            <div class="pb-3 pt-1 h5 text-danger text-center">
                {{$job->title}}
            </div>
            <div class="d-flex justify-content-between 
            column-gap-4">
                <div>
                    <div  class="d-flex column-gap-3">
                        <div class="d-flex column-gap-2 mb-2">
                            <img src="{{ asset('storage/images/icons/location.svg') }}" style="width: 20px;">
                            <p>{{$job->location->city}}</p>
                        </div>
                        
                        <div class="d-flex column-gap-2 mb-2">
                            <img src="{{ asset('storage/images/icons/briefcase.svg') }}" style="width: 20px;">
                            <p>{{$job->setting_type}}</p>
                        </div>
                    </div>
                    <div class="d-flex column-gap-3">
                        <div class="d-flex column-gap-2 mb-2">
                            <img src="{{ asset('storage/images/icons/group.svg') }}" style="width: 20px;">
                            <p>{{$job->employee_amount}} person</p>
                        </div>
                        
                        <div class="d-flex column-gap-2 mb-2">
                            <img src="{{ asset('storage/images/icons/contract.svg') }}" style="width: 20px;">
                            <p>Contract/ {{$job->duration}}</p>
                        </div>
                    </div>
                    <div class="d-flex column-gap-2 mb-2">
                        <img src="{{ asset('storage/images/icons/watch.svg') }}" style="width: 20px;">
                        <p>{{$job->weekly_hours}} hours / week</p>
                    </div>
                </div>
                <div>
                    <h1 class="h1">{{$job->wage}}</h1>
                    <p>euro per hour</p>
                </div>
            </div>
    </div>
    @else
    <div class="col-lg-8 ">
        <div class=" p-2 justify-content-between 
        column-gap-4">
            <div class="pb-3 pt-1 h5 text-danger text-center">
                {{$job->title}}
            </div>
            <div class="d-flex justify-content-between 
        column-gap-1">
                <div>
                    <div  class="d-flex column-gap-1">
                        <div class="d-flex column-gap-1 mb-2">
                            <img src="{{ asset('storage/images/icons/location.svg') }}" style="width: 20px;">
                            <p>{{$job->location->city}}</p>
                        </div>
                    </div>
                    <div class="d-flex column-gap-3">
                        <div class="d-flex column-gap-2 mb-2">
                            <img src="{{ asset('storage/images/icons/group.svg') }}" style="width: 20px;">
                            <p>{{$job->employee_amount}} person</p>
                        </div>
                    </div>
                </div>
                 <div class="d-flex column-gap-2">
                <div class="align-items-center justify-content-center p-1">
                    <img src="{{ asset('storage/images/icons/calendar.svg') }}" style="width: 20px;">
                </div>
                <div>
                    <div class="text-center">
                        {{Carbon::parse($job->start_date)->dayOfMonth}}
                        {{Carbon::parse($job->start_date)->shortEnglishDayOfWeek;}}
                        {{Carbon::parse($job->start_date)->format('F')}}
                    </div>
                    <div class="small text-muted">
                        {{Carbon::parse($job->from)->format('H:i')}}
                        - {{Carbon::parse($job->to)->format('H:i')}}
                        / <span class="fw-bold">{{$time->durationHours($job->from,$job->to)}} hours</span> 
                    </div>
                </div>
            </div>
                <div>
                    <h1 class="h1">{{$job->wage}}</h1>
                    <p>euro per hour</p>
                </div>
            </div>
           
    </div>

    
    
    @endif
</div>
</div>
@endsection