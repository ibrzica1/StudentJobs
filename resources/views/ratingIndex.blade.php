@extends("layout")

@section("pageTitle")
    My Applications
@endsection

@section("content")
<body class=" bg-body-secondary">
    

    <img src="{{ !empty($user->profile_picture) && file_exists(storage_path('app/public/images/user_avatar/'.$user->profile_picture)) 
                        ? asset('storage/images/user_avatar/'.$user->profile_picture) 
                        : asset('storage/images/user_avatar/avatar-default.png') }}"
                        class="rounded shadow-sm mb-3 d-block mx-auto m-3"
                        style="width: 180px; height: 180px; object-fit: cover;">
                
    <h5 class="fw-bold mb-1 text-center">
        {{ $user->firstName }}
        {{ $user->lastName }}
    </h5>

    <x-user-rating :rating="$user->average_rating" />

@foreach ($user->ratings as $rating)
    <div class="bg-white rounded shadow-sm p-4 mb-4 m-3">
        <div class="row align-items-center">

            {{-- Employer Info (Lijeva strana - 4 stupca) --}}
            <div class="col-md-4 text-center border-end">
                <img src="{{ !empty($rating->job->employer->profile_picture) && file_exists(storage_path('app/public/images/user_avatar/'.$rating->job->employer->profile_picture)) 
                    ? asset('storage/images/user_avatar/'.$rating->job->employer->profile_picture) 
                    : asset('storage/images/user_avatar/avatar-default.png') }}"
                     class="rounded shadow-sm mb-3 d-block mx-auto"
                     style="width: 110px; height: 110px; object-fit: cover;">

                <h5 class="fw-bold mb-1">
                    {{ $rating->job->employer->firstName }}
                    {{ $rating->job->employer->lastName }}
                </h5>

                <small class="text-muted d-block mb-3">
                    {{ $rating->job->employer->location->city ?? '' }}
                </small>
            </div>

            {{-- Employer Rating & Comment (Desna strana - 8 stupaca) --}}
            <div class="col-md-8 ps-md-5 mt-4 mt-md-0">

                {{-- Rating Score --}}
                <div class="mb-3">
                    <span class="text-uppercase text-muted small fw-bold">
                        Rating
                    </span>

                    <div class="d-flex align-items-center gap-2 mt-2">
                        <span class="fs-4 fw-bold text-danger">
                            {{ $rating->score }}
                        </span>
                        <span class="text-muted">
                            / 5
                        </span>
                    </div>
                </div>

                {{-- Comment --}}
                @if ($rating?->comment)
                    <div class="border-top pt-3">
                        <span class="text-uppercase text-muted small fw-bold">
                            {{ __('myAds.Comment') }}
                        </span>
                        <div class="bg-light rounded p-3 mt-2">
                            <p class="mb-0 text-dark">
                                "{{ $rating->comment }}"
                            </p>
                        </div>
                    </div>
                @else
                    <div class="border-top pt-3">
                        <span class="text-muted small">
                            {{ __('myAds.No comment was added.') }} 
                        </span>
                    </div>
                @endif

            </div>

        </div>
    </div>
@endforeach
</body>
@endsection