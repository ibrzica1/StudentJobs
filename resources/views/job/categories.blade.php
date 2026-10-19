@extends("layout")

@section("pageTitle", "Helper Categories")

@section("content")

<?php 
use App\Models\Job;
use App\Enums\JobCategories;
use App\Enums\JobTypesEnum;
?>

<style>
    
    @foreach (JobCategories::cases() as $type)
        .{{$type}} {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease, display 0.3s allow-discrete;
        }

        .btn:hover .{{$type->value}} {
            display: flex;
            opacity: 1;
        }

        @starting-style {
            .btn:hover .{{$type->value}} {
                opacity: 0;
            }
        }
    @endforeach
</style>

<body class="bg-body-secondary">
<div class="container">
    <div class="d-flex justify-content-center align-items-center
                mt-4 mb-1 ">
        @if ($jobType === JobTypesEnum::HELPER_JOB->value)
        <a href="{{route('job.helper.create',['category' => "none"])}}"
            class="btn bg-info col-6 shadow py-4">
           {{__("categories.Continue with your own category")}} 
        </a>
        @else
        <a href="{{route('job.create',['category' => "none"])}}"
            class="btn bg-info col-6 shadow py-4">
           {{__("categories.Continue with your own category")}} 
        </a>
        @endif
    </div>
    
    <div class="d-flex flex-wrap justify-content-center align-items-center">
        @foreach (JobCategories::cases() as $helperType)
        <div class="btn col-6 col-sm-4 
                bg-white my-4 mx-2 py-2 shadow">
                
            @if($jobType === JobTypesEnum::HELPER_JOB->value)
                <a href="{{route('job.helper.create',['category' => $helperType->value])}}">
                <p>{{__("categories.$helperType->value")}}</p>  
                <div class="{{$helperType->value}}">
                    <img src="{{ asset('storage/images/category/'.$helperType->value .'.jpg') }}">
                </div>
                </a>
            @else
                <a href="{{route('job.create',['category' => $helperType->value])}}">
                <p>{{__("categories.$helperType->value")}}</p>    
                <div class="{{$helperType->value}}">
                    <img src="{{ asset('storage/images/category/'.$helperType->value .'.jpg') }}">
                </div>
                </a>
            @endif
            
        </div>
        @endforeach
    </div>
</div>

@endsection