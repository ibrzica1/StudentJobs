@extends("layout")

@section("pageTitle")
    My Ads
@endsection

@section("content")
    <?php 
        use Carbon\Carbon;
        use App\Services\TimeService;
        use App\Models\Job;
        $time = new TimeService();
    ?>
    <h6 class="text-uppercase text-muted fw-bold mt-3 mb-3 mx-4 my-5">
        {{__('My Adds')}}
    </h6>

    @if ($ads->isEmpty())
        <div class="container">
            <div class="bg-white rounded shadow p-5 text-center">
                <img src="{{ asset('storage/images/icons/no-data.png') }}"
                    class="d-block mx-auto mb-4"
                    width="80"
                    height="80"
                    style="object-fit: cover;">
                <h3 class="fw-bold mb-2">{{__('You haven\'t created any jobs yet, but it\'s about time!')}}</h3>
                <p class="text-muted mb-4">{{__('Start by creating your first job listing.')}}</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{route('job.categories', ['jobType' => 'job'])}}" class="btn btn-danger px-4 py-2">
                        {{__('Create Internship Job')}}
                    </a>
                    <a href="{{route('job.categories', ['jobType' => 'helper'])}}" class="btn btn-outline-danger px-4 py-2">
                        {{__('Create Helper Job')}}
                    </a>
                </div>
            </div>
        </div>
    @else
        @foreach ($ads as $job)
            <div class="container d-flex mx-6 my-4 p-4 bg-white column-gap-3 rounded shadow align-items-center">
                
                <a href="{{route('job.show',['job' => $job->id])}}" class="d-flex column-gap-3 flex-grow-1 text-decoration-none text-dark">
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
                            {{ __('homepage.Published') }} {{$time->calculateTime($job->created_at)}}
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
                                <div class="d-flex column-gap-2">
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
                            <div class="m-2 column-gap-3">
                                <div class="d-flex column-gap-2 mb-2">
                                    <img src="{{ asset('storage/images/icons/calendar.svg') }}" style="width: 20px;">
                                    <p>{{$job->start_date}}</p>
                                </div>
                                <div class="d-flex column-gap-2">
                                    <img src="{{ asset('storage/images/icons/watch.svg') }}" style="width: 20px;">
                                    <p>{{$job->weekly_hours}} / {{ __('homepage.week') }}</p>
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
                                    <div class="text-center">{{$time->durationHours($job->from,$job->to)}} {{ __('homepage.hours') }}</div>
                                </div>
                            </div>
                            @endif

                            <div>
                                <h1 class="h1">{{$job->wage}}</h1>
                                <p>e{{ __('homepage.euro per hour') }}</p>
                            </div>

                        </div>
                    </div>
                </a>

                <div class="d-flex flex-column align-items-center gap-2 ms-3">
                    <a href="" class="btn btn-success btn-sm">
                        {{__('EDIT')}}
                    </a>
                    <form action="{{route('job.delete',['job' => $job->id])}}" method="post" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            {{__('profile.DELETE')}}
                        </button>
                    </form>
                </div>

            </div>
        @endforeach
    @endif
   
@endsection