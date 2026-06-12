@extends("layout")

@section("pageTitle")
    Profile
@endsection

@section("content")
@php
    use App\Models\Job;
@endphp

<div>
    <div>
        @if ($user->profile_picture)
            <img src="storage/images/user_avatar/{{ $user->profile_picture }}">
        @else
            <img src="storage/images/icons/home.png">
        @endif
    </div>

    <div>

    </div>
</div>

@endsection