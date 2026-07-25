
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