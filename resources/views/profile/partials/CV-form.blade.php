<form
action="{{ route('profile.update.user-cv') }}"
method="POST"
enctype="multipart/form-data">
@csrf
@method('PATCH')

    <hr class="my-4">

    {{-- CV --}}
    <h6 class="text-uppercase text-muted fw-bold mb-3">
        CV
    </h6>

    <div class="mb-4">
        <input
            type="file"
            name="cv"
            id="cv"
            class="form-control"
        >
    </div>

    <button
        type="submit"
        class="btn btn-success btn-lg w-100 py-3"
    >
        {{__('profile.UPLOAD CV')}}
    </button>

</form>