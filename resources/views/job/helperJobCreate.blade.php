@extends("layout")

@section("pageTitle", "Create Job")

@section("content")

<?php 
use App\Models\Job;
?>

<style>
    .custom-range-slider::-webkit-slider-runnable-track {
        background-color: #ffb4b4;
        height: 0.5rem;
        border-radius: 0.25rem;
    }

    .custom-range-slider::-moz-range-track {
        background-color: #f00505;
        height: 0.5rem;
        border-radius: 0.25rem;
    }
    .custom-range-slider::-webkit-slider-thumb {
        background-color: #2ea32c;
    }
    
    .custom-range-slider::-moz-range-thumb {
        background-color: #2ea32c;
        border: none;
    }

    .custom-range-slider::-webkit-slider-thumb:active {
        background-color: #2ea32c;
    }

    .custom-range-slider:focus::-webkit-slider-thumb {
        box-shadow: 0 0 0 0.25rem rgba(129, 255, 74, 0.25);
    }
    .custom-input {
        border: 1px solid #f00505 !important;
        border-radius: 4px;
    }
    .custom-input:focus {
        box-shadow: 0 0 0 0.25rem rgba(240, 5, 5, 0.25);
    }
    .input-group-text {
        background-color: #fff;
        border: 1px solid #f00505;
        border-right: none;
    }
</style>

<div class="container-fluid bg-light py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-5">

                    <h2 class="text-end fw-bold mb-4">
                       {{__('helperJobCreate.New Job')}} / 
                       <span class="text-primary">{{__('helperJobCreate.Helper')}}</span>
                    </h2>
                    <hr class="mb-4">

                    <form action="{{route('job.helper.store')}}" method="post">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">{{$errors->first()}}</div>
                        @endif

                        <h6 class="text-uppercase text-muted fw-bold mt-3 mb-3">
                            {{__('helperJobCreate.Booking details')}}</h6>

                        <input type="hidden" name="category" value="{{$category}}">
                        <div class="mb-3">
                            <label class="form-label">
                                {{__('helperJobCreate.Title / Your booking')}}</label>
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('storage/images/icons/title.svg') }}" style="width: 20px;"></span>
                                @if (isset(Job::ROLES[$category]['TITLE']))
                                    <input type="text" name="title" 
                                    value="{{Job::ROLES[$category]['TITLE']}} Helper Needed"
                                    class="form-control custom-input">
                                @else
                                    <div class="flex-grow-1">
                                        <livewire:helper-type-search />
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{__('helperJobCreate.Location')}}</label>
                            <livewire:location-search />
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">{{__('helperJobCreate.Address')}}</label>
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('storage/images/icons/street.svg') }}" style="width: 20px;"></span>
                                <input type="text" name="address" id="address" class="form-control custom-input" 
                                placeholder="{{__('helperJobCreate.Street address, house number (optional)')}}">
                            </div>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">
                                {{__('helperJobCreate.How many moving helpers?')}}</label>
                            <input type="number" name="employee_amount" class="form-control custom-input">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                {{__('helperJobCreate.Helper wage per person')}}</label>
                            <livewire:wage-range />
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    {{__('helperJobCreate.Deployment date')}}</label>
                                <input type="date" name="start_date" class="form-control custom-input">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    {{__('helperJobCreate.From')}}</label>
                                <input type="time" name="from" class="form-control custom-input">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    {{__('helperJobCreate.To')}}</label>
                                <input type="time" name="to" class="form-control custom-input">
                            </div>
                        </div>

                        <h6 class="text-uppercase text-muted fw-bold mt-4 mb-3">
                            {{__('helperJobCreate.Job Details')}}</h6>

                        <div class="mb-3">
                            <label class="form-label">
                                {{__('helperJobCreate.Description')}}</label>
                            <textarea name="description" class="form-control custom-input" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                {{__('helperJobCreate.Tasks')}}</label>
                            @if (isset(Job::ROLES[$category]['TASKS']))
                                <textarea name="tasks" class="form-control custom-input" rows="8">
                                {{Job::ROLES[$category]['TASKS']}}
                                </textarea>
                            @else
                               <textarea name="tasks" class="form-control custom-input" rows="3"></textarea>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                {{__('helperJobCreate.Expectation')}}</label>
                            @if (isset(Job::ROLES[$category]['EXPECTATIONS']))
                                <textarea name="expectation" class="form-control custom-input" rows="8">
                                {{Job::ROLES[$category]['EXPECTATIONS']}}
                                </textarea>
                            @else
                                <textarea name="expectation" class="form-control custom-input" rows="3"></textarea>
                            @endif
                            
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success btn-lg w-100 py-3 shadow-sm">
                                {{__('helperJobCreate.SUBMIT JOB')}}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection