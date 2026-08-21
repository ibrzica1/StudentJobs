 <form
action="{{ route('profile.update.user-avatar') }}"
method="POST"
enctype="multipart/form-data">
@csrf
@method('PATCH')

    <hr class="my-4">

    {{-- PROFILE PICTURE --}}
    <h6 class="text-uppercase text-muted fw-bold mb-3">
        {{__('profile.Profile Picture')}}
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
        {{__('profile.CHANGE AVATAR')}}
    </button>

</form>