<form
action="{{ route('profile.update.user-address') }}"
method="POST"
>
@csrf
@method('PATCH')

<hr class="my-4">


<h6 class="text-uppercase text-muted fw-bold mb-3">
    {{__('profile.Address')}}
</h6>

<div class="mb-3">

    <label class="form-label">
        {{__('profile.City')}}
    </label>

    <livewire:location-search />

</div>

<div class="row">
    <div class="col-md-8 mb-3">
        <label for="street" class="form-label">{{__('profile.Street')}}</label>
        <div class="input-group">
            <span class="input-group-text">
                <img src="{{ asset('storage/images/icons/street.svg') }}" width="20">
            </span>
            <input type="text" id="street" name="street" value="{{ $user->street }}" class="form-control" required>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label for="houseNumber" class="form-label">{{__('profile.House Number')}}</label>
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
    {{__('profile.SAVE CHANGES')}}
</button>
</form>