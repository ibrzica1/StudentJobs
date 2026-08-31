@extends("layout")

@section("pageTitle")
    My Ads
@endsection

@section("content")
    @foreach ($ads as $ad)
        <div>{{$ad->title}}</div>
    @endforeach
@endsection