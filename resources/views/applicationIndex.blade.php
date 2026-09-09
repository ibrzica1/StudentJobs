@extends("layout")

@section("pageTitle", "Application Index")

@section("content")

@foreach ($applications as $application)
    <div>{{$application->seen_status}} {{$application->id}}</div>
@endforeach

@endsection