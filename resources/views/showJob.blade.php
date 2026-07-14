@extends("layout")

@section("pageTitle", "Show Job")

@section("content")
<?php 
    use Carbon\Carbon;
    use App\Services\TimeService;
    $time = new TimeService();

?>
<body class="bg-body-secondary">
<div class="container d-flex column-gap-3 mt-4">

    <div class="col-3 bg-white p-3 rounded shadow h-100">
         @if ($job->company === null)
            <img src="{{ asset('storage/images/company_logo/default.png') }}"
            class="rounded-circle shadow-sm mb-3 d-block mx-auto"
            width="130"
            height="130"
            style="object-fit: cover;">
        @else
            <img src="{{ asset('storage/images/company_logo/'.$job->company->logo) }}"
            class="rounded-circle shadow-sm mb-3 d-block mx-auto"
            width="130"
            height="130"
            style="object-fit: cover;">
        @endif
        <div class="text-center text-muted small">
            Published {{$time->calculateTime($job->created_at)}}
        </div>
    </div>
    @if ($job->type === 'job')
    <div class="col ">
        <div class="p-4 bg-white justify-content-between 
        column-gap-4 rounded shadow">
            <div class="pb-3 pt-1 h5 text-danger">
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

    <div class="my-3 bg-white justify-content-between 
        column-gap-4 rounded shadow">
        <div class="bg-light text-end fw-bold p-3">Job description</div>
        <div class="p-4">{{$job->description}}</div>
    </div>

    <div class="my-3 bg-white justify-content-between 
        column-gap-4 rounded shadow">
        <div class="bg-light text-end fw-bold p-3">Job expectation</div>
        <div class="p-4">{{$job->expectation}}</div>
    </div>

    <div class="my-3 bg-white justify-content-between 
        column-gap-4 rounded shadow">
        <div class="bg-light text-end fw-bold p-3">Job offer</div>
        <div class="p-4">{{$job->offer}}</div>
    </div>
    <div class="justify-content-end align-item-end">
        <button class="btn bg-success text-white
        px-8 fw-bold">Apply now</button>
    </div>
    
</div>
@else
    <div class="col ">
        <div class=" p-4 bg-white justify-content-between 
        column-gap-4 rounded shadow">
            <div class="pb-3 pt-1 h5 text-danger">
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
                    </div>
                    <div class="d-flex column-gap-3">
                        <div class="d-flex column-gap-2 mb-2">
                            <img src="{{ asset('storage/images/icons/group.svg') }}" style="width: 20px;">
                            <p>{{$job->employee_amount}} person</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="h1">{{$job->wage}}</h1>
                    <p>euro per hour</p>
                </div>
            </div>
    </div>

    
    <div class="my-3 bg-white justify-content-between 
        column-gap-4 rounded shadow col-6">
        <h5 class="bg-light text-end fw-bold p-3">Deployment date</h5>
        <div class="d-flex p-4 column-gap-2">
            <div class="align-items-center justify-content-center p-1">
                <img src="{{ asset('storage/images/icons/calendar.svg') }}" style="width: 20px;">
            </div>
            <div>
                <div>
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
    </div>

    <div class="my-3 bg-white justify-content-between 
        column-gap-4 rounded shadow">
        <div class="bg-light text-end fw-bold p-3">Job description</div>
        <div class="p-4">{{$job->description}}</div>
    </div>

    <div class="my-3 bg-white justify-content-between 
        column-gap-4 rounded shadow">
        <div class="bg-light text-end fw-bold p-3">Job expectation</div>
        <div class="p-4">{{$job->expectation}}</div>
    </div>

    <div class="my-3 bg-white justify-content-between 
        column-gap-4 rounded shadow">
        <div class="bg-light text-end fw-bold p-3">Job tasks</div>
        <div class="p-4">{{$job->tasks}}</div>
    </div>
    <div class="justify-content-end">
        <a href="{{route('application.create',['job' => $job->id])}}"
        class="btn bg-success text-white
        px-8 fw-bold">
            Apply now
        </a>
    </div>
</div>    
@endif
</div>
</div>

<div class="container mt-4">
    <h4 class="text-end h4">Other similar jobs</h4>

    @foreach ($similarJobs as $job)
        <a href="{{route('job.show',['job' => $job->id])}}" class="container d-flex mx-6 my-4
     p-4 bg-white column-gap-3 rounded shadow">
        <div class="col-3">
            @if ($job->company === null)
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
                Published {{$time->calculateTime($job->created_at)}}
            </div>
        </div>

        <div class="col">

            <h3 class="text-danger fw-bold my-2">
                {{$job->title}}
            </h3>
            <div class="d-flex justify-content-between column-gap-4">

                <div class="m-2 column-gap-3">
                    <div class="d-flex column-gap-2 mb-2">
                        <img src="{{ asset('storage/images/icons/location.svg') }}" style="width: 20px;">
                        <p>{{$job->location->city}}</p>
                    </div>
                    <div class="d-flex  column-gap-2">
                        @if ($job->type === 'job')
                            <img src="{{ asset('storage/images/icons/sand-watch.svg') }}" style="width: 20px;">
                            <p>{{$job->duration}}</p>
                        @else
                            <img src="{{ asset('storage/images/icons/group.svg') }}" style="width: 20px;">
                            <p>{{$job->employee_amount}}</p>
                        @endif
                    </div>
                </div>

                
                @if ($job->type === 'job')
                <div>
                    <div class="d-flex column-gap-2 mb-2">
                        <img src="{{ asset('storage/images/icons/calendar.svg') }}" style="width: 20px;">
                        <p>{{$job->start_date}}</p>
                    </div>
                    <div class="d-flex column-gap-2">
                        <img src="{{ asset('storage/images/icons/watch.svg') }}" style="width: 20px;">
                        <p>{{$job->weekly_hours}} / week</p>
                    </div>
                </div>
                @else
                <div class="d-flex m-2 column-gap-3">
                    <div>
                        <img src="{{ asset('storage/images/icons/calendar.svg') }}" style="width: 20px;">
                    </div>
                    <div>
                        <div class="fw-bold text-center">{{Carbon::parse($job->start_date)->dayOfMonth}}</div>
                        <div class="text-danger text-center">{{Carbon::parse($job->start_date)->shortEnglishDayOfWeek;}}</div>
                    </div>
                    <div>
                        <div class="fw-bold text-center">{{Carbon::parse($job->start_date)->format('F')}}</div>
                        <div class="text-center">{{Carbon::parse($job->start_date)->year}}</div>
                    </div>
                    <div>
                        <div class="fw-bold text-center">{{Carbon::parse($job->from)->format('H:i')}}
                             - {{Carbon::parse($job->to)->format('H:i')}}</div>
                        <div class="text-center">{{$time->durationHours($job->from,$job->to)}} hours</div>
                    </div>
                </div>
                @endif
                    
                <div>
                    <h1 class="h1">{{$job->wage}}</h1>
                    <p>euro per hour</p>
                </div>

            </div>
        </div>
</a>
    @endforeach
</div>



@endsection