@extends("layout")

@section("pageTitle")
    Main page
@endsection

@section("content")
<a href="{{route('job.helper.create.page')}}">Post a job</a>

@endsection