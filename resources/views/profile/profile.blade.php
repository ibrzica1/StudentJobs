@extends("layout")

@section("pageTitle")
    Profile
@endsection

@section("content")
<div class="bg-light">


<div class="container py-5">

    <div class="row g-4">

        {{-- PROFILE CARD --}}
        <div class="col-lg-4">

            <div class="card shadow-sm border-0">

                <div class="card-body justify-content-center text-center p-4">

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
                        Student Profile
                    </p>

                    <div class="row text-center mb-4">

                        <div class="col">
                            <h4 class="fw-bold mb-0">0</h4>
                            <small class="text-muted">
                                BOOKINGS
                            </small>
                        </div>

                        <div class="col">
                            <h4 class="fw-bold mb-0">0</h4>
                            <small class="text-muted">
                                INVOICES
                            </small>
                        </div>

                    </div>

                    <a href="#" class="btn btn-success w-100">
                        BOOK STUDENTS
                    </a>

                </div>

            </div>

        </div>

        {{-- EDIT PROFILE --}}
        <div class="col-lg-8">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <h2 class="fw-bold mb-4">
                        Edit Information
                    </h2>

                    <form
                        action="{{route('profile.update.user-info')}}"
                        method="POST"
                    >
                        @csrf
                        @method('PATCH')

                        {{-- PERSONAL DETAILS --}}
                        <h6 class="text-uppercase text-muted fw-bold mb-3">
                            Personal Details
                        </h6>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label for="firstName" class="form-label">
                                    First Name
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <img
                                            src="{{ asset('storage/images/icons/usr-info.svg') }}"
                                            width="20"
                                        >
                                    </span>

                                    <input
                                        type="text"
                                        id="firstName"
                                        name="firstName"
                                        value="{{ $user->firstName }}"
                                        class="form-control"
                                        required
                                    >

                                </div>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="lastName" class="form-label">
                                    Last Name
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <img
                                            src="{{ asset('storage/images/icons/usr-info.svg') }}"
                                            width="20"
                                        >
                                    </span>

                                    <input
                                        type="text"
                                        id="lastName"
                                        name="lastName"
                                        value="{{ $user->lastName }}"
                                        class="form-control"
                                        required
                                    >

                                </div>

                            </div>

                            <div class="mb-4">

                                <label
                                    for="telephone"
                                    class="form-label"
                                >
                                    Telephone Number
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <img
                                            src="{{ asset('storage/images/icons/telephone.svg') }}"
                                            width="20"
                                        >
                                    </span>

                                    <input
                                        type="tel"
                                        id="telephone"
                                        name="telephone"
                                        value="{{ $user->telephone }}"
                                        class="form-control"
                                    >

                                </div>

                            </div>

                             <button
                                type="submit"
                                class="btn btn-success btn-lg w-100 py-3"
                            >
                                SAVE CHANGES
                            </button>

                        </div>

                    </form>
                    <form
                        action="{{ route('profile.update.user-address') }}"
                        method="POST"
                    >
                        @csrf
                        @method('PATCH')

                        <hr class="my-4">

                        {{-- ADDRESS --}}
                        <h6 class="text-uppercase text-muted fw-bold mb-3">
                            Address
                        </h6>

                        <div class="mb-3">

                            <label class="form-label">
                                City
                            </label>

                            <livewire:location-search />

                        </div>

                       <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="street" class="form-label">Street</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('storage/images/icons/street.svg') }}" width="20">
                                    </span>
                                    <input type="text" id="street" name="street" value="{{ $user->street }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="houseNumber" class="form-label">House Number</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('storage/images/icons/house-number.svg') }}" width="20">
                                    </span>
                                    <input type="text" id="houseNumber" name="house_number" value="{{ $user->house_number }}" class="form-control" required>
                                </div>
                            </div>
                        </div>

                         <button
                            type="submit"
                            class="btn btn-success btn-lg w-100 py-3">
                            SAVE CHANGES
                        </button>
                       </form>

                       <form
                        action="{{ route('profile.update.user-avatar') }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                            <hr class="my-4">

                            {{-- PROFILE PICTURE --}}
                            <h6 class="text-uppercase text-muted fw-bold mb-3">
                                Profile Picture
                            </h6>

                            <div class="mb-4">
                                <input
                                    type="file"
                                    name="profilePicture"
                                    id="imageStudent"
                                    class="form-control"
                                >
                            </div>

                            <button
                                type="submit"
                                class="btn btn-success btn-lg w-100 py-3"
                            >
                                CHANGE AVATAR
                            </button>

                       </form>

                    @if ($user->role === 'employer')
                        
                        @if ($companies !== null)
                            
                            @foreach ($companies as $company)
                                
                                <form action=""
                                    method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    {{-- COMPANY LOGO --}}
                                    <h6 class="text-uppercase text-muted fw-bold mb-3">
                                        Company Logo
                                    </h6>

                                    @if ($company->logo)
                                        <img 
                                        src="{{ asset('storage/images/company_logo/'.$company->logo) }}"
                                        alt="Company Logo"
                                        class="rounded-circle shadow-sm mb-3 d-block mx-auto"
                                        width="150"
                                        height="150"
                                        style="object-fit: cover;">
                                    @else
                                        <img 
                                        src="{{ asset('storage/images/company_logo/default.png') }}"
                                        alt="Company Logo"
                                        class="rounded-circle shadow-sm mb-3 d-block mx-auto"
                                        width="150"
                                        height="150"
                                        style="object-fit: cover;">
                                    @endif

                                    <div class="mb-4">
                                        <input
                                            type="file"
                                            name="companyLogo"
                                            class="form-control"
                                        >
                                    </div>

                                    

                                    <button
                                        type="submit"
                                        class="btn btn-success btn-lg w-100 py-3">
                                        CHANGE LOGO
                                    </button>
                                    

                                </form>

                                <form action="" method="post">
                                    @csrf
                                    @method('PATCH')

                                    {{-- COMPANY INFO--}}
                                    <h6 class="text-uppercase text-muted fw-bold mb-3">
                                        Company Info
                                    </h6>

                                    <div class="col-md-4 mb-3">
                                        <label for="companyName" class="form-label">Company Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><img src="{{ asset('storage/images/icons/company.svg') }}" style="width: 20px;"></span>
                                            <input type="text" 
                                            id="companyName" 
                                            name="companyName" 
                                            value="{{ $company->name }}" 
                                            class="form-control custom-input" required>
                                        </div>
                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-success btn-lg w-100 py-3">
                                        SAVE CHANGES
                                    </button>
                                </form>

                            @endforeach

                        @endif

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

</div>

@endsection