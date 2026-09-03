@extends("layout")

@section("pageTitle")
    Job Edit
@endsection

@section("content")
<?php 
use App\Models\Job;
?>
@if ($job->type === Job::JOB)
    
    @include('job.partials.job-edit-form')

@elseif ($job->type === Job::HELPER_JOB)

    @include('job.partials.helper-job-edit-form')

@endif
@endsection