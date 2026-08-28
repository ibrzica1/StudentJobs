@extends("layout")

@section("pageTitle", "Create Job")

@section("content")
@php
    use App\Models\Job;
@endphp

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
                       {{__('jobCreate.Create /')}}  
                       <span class="text-primary">{{__('jobCreate.Job')}}</span>
                    </h2>
                    <hr class="mb-4">

                    <form action="{{route('job.store')}}" method="post">
                        @csrf
                        
                        @if($errors->any())
                            <div class="alert alert-danger">{{$errors->first()}}</div>
                        @endif

                        <h6 class="text-uppercase text-muted fw-bold mt-3 mb-3">
                            {{__('jobCreate.Booking details')}}</h6>
                        <input type="hidden" name="category" value="{{$category}}">
                        <div class="mb-3">
                            <label class="form-label">
                                {{__('jobCreate.Title / Your booking')}}</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="{{ asset('storage/images/icons/title.svg') }}" width="20">
                                </span>
                                @if (isset($category))
                                    <input type="text" name="title" 
                                    value="{{__('categories.'.$category)}} {{__('jobCreate.employee needed')}}"
                                    class="form-control custom-input">
                                @else
                                  <input type="text" name="title" class="form-control custom-input"
                                   placeholder="{{__('jobCreate.Job Title')}}" required>
                                @endif
                                
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{__('jobCreate.Location')}}</label>
                            <livewire:location-search />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{__('jobCreate.Company')}}</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="{{ asset('storage/images/icons/company.svg') }}" width="20">
                                </span>
                                <select name="company_id" class="form-select custom-input">
                                    <option value="">{{__('jobCreate.NONE')}}</option>
                                    @foreach ($companies as $company)
                                        <option value="{{$company->id}}">
                                            {{$company->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class=" col-md-6 mb-3">
                            <label class="form-label">
                                {{__('jobCreate.Wage per hour')}}</label>
                            <livewire:wage-range />
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    {{__('jobCreate.Setting Type')}}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('storage/images/icons/watch.svg') }}" width="20">
                                    </span>
                                    <select name="setting_type" class="form-select custom-input">
                                        @foreach (Job::ALLOWED_SETTING_TYPES as $type)
                                            <option>{{__("settingTypes.$type")}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    {{__('jobCreate.Weekly hours')}}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('storage/images/icons/watch.svg') }}" width="20">
                                    </span>
                                     <input type="number" name="weekly_hours" class="form-control custom-input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    {{__('jobCreate.Date of hiring')}}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('storage/images/icons/calendar.svg') }}" width="20">
                                    </span>
                                    <input type="date" name="start_date" class="form-control custom-input">
                                </div>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    {{__('jobCreate.Duration')}}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('storage/images/icons/watch.svg') }}" width="20">
                                    </span>
                                    <select name="duration" class="form-select custom-input">
                                        @foreach (Job::ALLOWED_DURATION_TYPES as $type)
                                            <option>{{__("durationTypes.$type")}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                        </div>

                        <h6 class="text-uppercase text-muted fw-bold mt-4 mb-3">
                            {{__('jobCreate.Job Description')}}</h6>

                        <div class="mb-3">
                            <label class="form-label">
                                {{__('jobCreate.Job Description')}}</label>
                            <textarea name="description" class="form-control custom-input" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                {{__('jobCreate.Expectation')}}</label>
                            @if (isset($category))
                                <textarea name="expectation" class="form-control custom-input" rows="8">
                                {{__("expectations.$category")}}
                                </textarea>
                            @else
                                <textarea name="expectation" class="form-control custom-input" rows="3"></textarea>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                {{__('jobCreate.Offer')}}</label>
                            <textarea name="offer" class="form-control custom-input" rows="3"></textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success btn-lg w-100 py-3 shadow-sm">
                                {{__('jobCreate.SUBMIT JOB')}}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection