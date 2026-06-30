@extends("layout")

@section("pageTitle")
    Main page
@endsection

@section("content")

@foreach ($jobs as $job)
    <p>{{$job->title}}</p>
@endforeach

<div>{{$jobs->links()}}</div>

@endsection