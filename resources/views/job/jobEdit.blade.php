@extends("layout")

@section("pageTitle")
    Job Edit
@endsection

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

   @if ($job->type === Job::JOB)
       
   @elseif ($job->type === Job::HELPER_JOB)
    

    <div class="container-fluid bg-light py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-5">

                        <h2 class="text-end fw-bold mb-4">
                        {{__('.Edit Job')}} / 
                        <span class="text-primary">{{__('.Helper')}}</span>
                        </h2>
                        <hr class="mb-4">

                        <form action="{{route('job.helper.store')}}" method="post">
                            @csrf
                            @if($errors->any())
                                <div class="alert alert-danger">{{$errors->first()}}</div>
                            @endif

                            <h6 class="text-uppercase text-muted fw-bold mt-3 mb-3">
                                {{__('helperJobCreate.Booking details')}}</h6>

                            <input type="hidden" name="category" value="">
                            <div class="mb-3">
                                <label class="form-label">
                                    {{__('helperJobCreate.Title / Your booking')}}</label>
                                <div class="input-group">
                                    <span class="input-group-text"><img src="{{ asset('storage/images/icons/title.svg') }}" style="width: 20px;"></span>
                                        <div class="flex-grow-1">
                                            <livewire:helper-type-search />
                                        </div>
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
                                    value="{{$job->address}}">
                                </div>
                            </div>

                            
                            <div class="mb-3">
                                <label class="form-label">
                                    {{__('helperJobCreate.How many moving helpers?')}}</label>
                                <input type="number" name="employee_amount" 
                                class="form-control custom-input"
                                value="{{$job->employee_amount}}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    {{__('helperJobCreate.Helper wage per person')}}</label>
                                <livewire:wage-range :job="$job"/>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        {{__('helperJobCreate.Deployment date')}}</label>
                                    <input type="date" name="start_date" class="form-control custom-input"
                                    value="{{$job->start_date}}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        {{__('helperJobCreate.From')}}</label>
                                    <input type="time" name="from" class="form-control custom-input"
                                    value="{{$job->from}}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        {{__('helperJobCreate.To')}}</label>
                                    <input type="time" name="to" class="form-control custom-input"
                                    value="{{$job->to}}">
                                </div>
                            </div>

                            <h6 class="text-uppercase text-muted fw-bold mt-4 mb-3">
                                {{__('helperJobCreate.Job Details')}}</h6>

                            <div class="mb-3">
                                <label class="form-label">
                                    {{__('helperJobCreate.Description')}}</label>
                                <textarea name="description" class="form-control custom-input" rows="3">
{{$job->description}}
                                </textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    {{__('helperJobCreate.Tasks')}}</label>
                                    <textarea name="tasks" class="form-control custom-input" rows="8">
{{$job->tasks}}
                                    </textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">
                                    {{__('helperJobCreate.Expectation')}}</label>
                                    <textarea name="expectation" class="form-control custom-input" rows="8">
{{$job->expectation}}
                                    </textarea>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success btn-lg w-100 py-3 shadow-sm">
                                    {{__('EDIT JOB')}}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
   @endif
@endsection