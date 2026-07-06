@extends("layout")

@section("pageTitle")
    Main page
@endsection

@section("content")
<?php 
    use Carbon\Carbon;
    use App\Services\TimeService;
    $time = new TimeService();

?>
<body class="bg-body-secondary">

<div class="mx-6 my-4">
    {{$jobs->links()}}
</div>

@foreach ($jobs as $job)
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

<div class="mx-6 my-4">
    {{$jobs->links()}}
</div>

@endsection