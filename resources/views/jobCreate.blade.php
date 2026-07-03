@extends("layout")

@section("pageTitle", "Create Job")

@section("content")
@php
    use App\Models\Job;
@endphp

<style>
    .custom-input {
        border: 1px solid #f00505 !important;
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
                        Create / <span class="text-primary">Job</span>
                    </h2>
                    <hr class="mb-4">

                    <form action="{{route('job.create')}}" method="post">
                        @csrf
                        
                        @if($errors->any())
                            <div class="alert alert-danger">{{$errors->first()}}</div>
                        @endif

                        <h6 class="text-uppercase text-muted fw-bold mt-3 mb-3">Booking details</h6>

                        <div class="mb-3">
                            <label class="form-label">Title / Your booking</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="{{ asset('storage/images/icons/title.svg') }}" width="20">
                                </span>
                               <input type="text" name="title" class="form-control custom-input" placeholder="Job Title" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <livewire:location-search />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Company</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <img src="{{ asset('storage/images/icons/company.svg') }}" width="20">
                                </span>
                                <select name="company_id" class="form-select custom-input">
                                    <option value="">NONE</option>
                                    @foreach ($companies as $company)
                                        <option value="{{$company->id}}">
                                            {{$company->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Helper wage per person</label>
                                <livewire:wage-range />
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Setting Type</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('storage/images/icons/watch.svg') }}" width="20">
                                    </span>
                                    <select name="setting_type" class="form-select custom-input">
                                        @foreach (Job::ALLOWED_SETTING_TYPES as $type)
                                            <option>{{$type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Weekly hours</label>
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
                                <label class="form-label">Date of hiring</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('storage/images/icons/calendar.svg') }}" width="20">
                                    </span>
                                    <input type="date" name="start_date" class="form-control custom-input">
                                </div>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Duration</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('storage/images/icons/watch.svg') }}" width="20">
                                    </span>
                                    <select name="duration" class="form-select custom-input">
                                        @foreach (Job::ALLOWED_DURATION_TYPES as $type)
                                            <option>{{$type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                        </div>

                        <h6 class="text-uppercase text-muted fw-bold mt-4 mb-3">Job Description</h6>

                        <div class="mb-3">
                            <label class="form-label">Job description</label>
                            <textarea name="description" class="form-control custom-input" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Expectation</label>
                            <textarea name="expectation" class="form-control custom-input" rows="3"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Offer</label>
                            <textarea name="offer" class="form-control custom-input" rows="3"></textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success btn-lg w-100 py-3 shadow-sm">
                                SUBMIT JOB
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection