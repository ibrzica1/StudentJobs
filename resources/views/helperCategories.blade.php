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
        <a href=""
            class="btn bg-info col-6 shadow">
            Continue with your own category
        </a>
    </div>
    
    <div class="d-flex flex-wrap justify-content-center align-items-center">
        @foreach (Job::ALLOWED_HELPER_TYPES as $type)
        <div class="btn col-6 col-sm-4 
                bg-white my-4 mx-2 py-2 shadow">
            <a href="{{route('job.helper.create.page',['category' => $type])}}" 
                >
                {{$type}}
            </a>
            <div class="{{$type}}">
                <img src="{{ asset('storage/images/category/'.$type .'.jpg') }}">
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection