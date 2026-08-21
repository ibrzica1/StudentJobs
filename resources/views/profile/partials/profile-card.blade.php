 @if ($user->profile_picture)
    <img
        src="{{ asset('storage/images/user_avatar/'.$user->profile_picture) }}"
        alt="Profile Picture"
        class="rounded-circle shadow-sm mb-3 d-block mx-auto"
        width="150"
        height="150"
        style="object-fit: cover;"
    >
@else
    <img
        src="{{ asset('storage/images/icons/home.png') }}"
        alt="Default Profile Picture"
        class="rounded-circle shadow-sm mb-3 d-block mx-auto"
        width="150"
        height="150"
        style="object-fit: cover;"
    >
@endif

<h3 class="fw-bold mb-1">
    {{ $user->firstName }} {{ $user->lastName }}
</h3>

<p class="text-muted mb-4">
    {{__('profile.Student Profile')}}
</p>


@if ($user->role === 'student')
<div class="row text-center mb-4">
    <div class="col">
        <h4 class="fw-bold mb-0">0</h4>
        <small class="text-muted">
            {{__('profile.TOTAL APPLICATIONS')}}
        </small>
    </div>

    <div class="col">
        <h4 class="fw-bold mb-0">0</h4>
        <small class="text-muted">
            {{__('profile.JOBS RECIEVED')}}
        </small>
    </div>
</div>
    <a href="#" class="btn btn-success w-100">
        {{__('profile.FIND JOB')}}
    </a>
</div>
@else
<div class="row text-center mb-4">
    <div class="col">
            <h4 class="fw-bold mb-0">0</h4>
            <small class="text-muted">
                {{__('profile.BOOKINGS')}}
            </small>
        </div>

        <div class="col">
            <h4 class="fw-bold mb-0">0</h4>
            <small class="text-muted">
                {{__('profile.INVOICES')}}
            </small>
        </div>
    </div>
        <a href="#" class="btn btn-success w-100">
            {{__('profile.BOOK STUDENTS')}}
        </a>
    </div>
    @endif