@extends("layout")

@section("pageTitle", "Application Create")

@section("content")
<?php 
    use Carbon\Carbon;
    use App\Services\TimeService;
    $time = new TimeService();

?>
<style>

</style>
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
<form action="" 
method="post"
enctype="multipart/form-data">
@csrf

<input type="hidden" name="jobId" value="{{$job->id}}">
<div class="container row bg-white p-2 rounded shadow h-100 mw-75 mt-3">
    <p class="text-end text-secondary">COVER LETTER</p>

    <p class="text-end fw-bold">Application text</p>
    <p class="text-end text-secondary"
    style="font-size: 14px">
        Below is your application text for this job</p>

    <textarea name="applicationText"
    class="form-control custom-input mt-2 text-secondary" rows="8">
Dear Mr./Mrs. {{$job->employer->lastName}}


   
Thank you for considering my application.
Sincerly,
{{$user->firstName}} {{$user->lastName}}
    </textarea>
</div>

@if ($user->profile_picture)
    <div class="container justify-content-center bg-white 
    py-2  px-4 rounded shadow h-100 mw-75 mt-3">
        <p class="text-end text-secondary">APPLICATION PHOTO</p>
        <div class="d-flex">
            <img
                src="{{ asset('storage/images/user_avatar/'.$user->profile_picture) }}"
                alt="Profile Picture"
                class="rounded-circle shadow-sm mb-3 d-block mx-auto"
                width="150"
                height="150"
                style="object-fit: cover;"
            >
            <a href="{{route('profile.edit')}}"
                class="btn w-25 h-25 bg-success shadow text-white mt-9 px-2">
                CHANGE AVATAR
            </a>
        </div>
        
    </div>
@else
    <div class="d-flex row justify-content-center bg-white 
    py-2  px-4 rounded shadow mw-75 mt-3"
    style="height: 210px;">
        <p class="text-end fw-bold">APPLICATION PHOTO</p>
        <p class="text-end text-secondary"
        style="font-size: 14px">
            Please upload your application photo here.</p>
        <div class="w-100 h-75 d-flex justify-content-center align-items-center
        border rounded mb-2">
            <input name="profilePicture" type="file"/>
        </div>
    </div>
@endif

@if ($user->cv)
    <div class="container justify-content-center bg-white 
    py-2  px-4 rounded shadow h-100 mw-75 mt-3">
        <p class="text-end text-secondary">CV</p>
        <div class="d-flex row justify-content-center"
        style="height: 150px;">
            <div class="d-flex h-50 justify-content-center align-items-center
            column-gap-3 border rounded mt-2">
                <img
                    src="{{ asset('storage/images/icons/file.svg') }}"
                    width="30"
                    height="30"
                >
                <p>{{$user->cv}}</p>
            </div>
            <a href="{{route('profile.edit')}}"
                class="btn w-25 h-25 bg-success shadow text-white px-2">
                CHANGE CV
            </a>
        </div>
        
    </div>
@else
    <div class="d-flex row justify-content-center bg-white 
    py-2  px-4 rounded shadow mw-75 mt-3"
    style="height: 200px;">
        <p class="text-end fw-bold">CV</p>
        <p class="text-end text-secondary"
        style="font-size: 14px">
            Please upload your CV here.</p>
        <div class="w-100 h-75 d-flex justify-content-center align-items-center
        border rounded">
            <input name="cv" type="file"/>
        </div>
    </div>
@endif

<div class="container d-flex row justify-content-center bg-white 
    py-2  px-4 rounded shadow h-100 mw-75 mt-3">
    <p class=" text-center text-secondary" 
    style="font-size: 14px">
        Please note that after you submit your application, your data will be submited to the employer
    </p>
    <button type="submit" class="btn btn-info text-white m-3">
        Submit application</button>
</div>
</form>

@endsection