@extends("layout")

@section("pageTitle", "Helper Categories")

@section("content")

<?php 
use App\Models\Job;
?>

<style>
    
    @foreach (Job::ALLOWED_HELPER_TYPES as $type)
        .{{$type}} {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease, display 0.3s allow-discrete;
        }

        .btn:hover .{{$type}} {
            display: flex;
            opacity: 1;
        }

        @starting-style {
            .btn:hover .{{$type}} {
                opacity: 0;
            }
        }
    @endforeach
</style>

<body class="bg-body-secondary">
<div class="container">
    <div class="d-flex justify-content-center align-items-center
                mt-4 mb-1 ">
        @if ($jobType === 'helper')
        <a href="{{route('job.helper.create.page',['category' => "none"])}}"
            class="btn bg-info col-6 shadow py-4">
            Continue with your own category
        </a>
        @else
        <a href="{{route('job.create.page',['category' => "none"])}}"
            class="btn bg-info col-6 shadow py-4">
            Continue with your own category
        </a>
        @endif
    </div>
    
    <div class="d-flex flex-wrap justify-content-center align-items-center">
        @foreach (Job::ALLOWED_HELPER_TYPES as $helperType)
        <div class="btn col-6 col-sm-4 
                bg-white my-4 mx-2 py-2 shadow">
                
            @if($jobType === 'helper')
                <a href="{{route('job.helper.create.page',['category' => $helperType])}}">
                    {{$helperType}}
                </a>
                <div class="{{$helperType}}">
                    <img src="{{ asset('storage/images/category/'.$helperType .'.jpg') }}">
                </div>
            @else
                <a href="{{route('job.create.page',['category' => $helperType])}}">
                    {{$helperType}}
                </a>
                <div class="{{$helperType}}">
                    <img src="{{ asset('storage/images/category/'.$helperType .'.jpg') }}">
                </div>
            @endif
            
        </div>
        @endforeach
    </div>
</div>

@endsection