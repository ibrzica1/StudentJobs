@extends("layout")

@section("pageTitle", "Show Job")

@section("content")

<div>{{$job->company->name}}</div>

@endsection