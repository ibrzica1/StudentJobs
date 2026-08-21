
<div>
    <button class="btn btn-primary"
            wire:click="$wire.toggleAddCompany">
        {{__('profile.ADD COMPANY')}}
    </button>
    <div wire:show="showAddCompany">
        <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="companyName">{{__('profile.Company Name')}}</label>
             <div class="input-group">
                <span class="input-group-text"><img src="{{ asset('storage/images/icons/company.svg') }}" style="width: 20px;"></span>
                <input type="text" name="companyName" class="form-control custom-input" required>
            </div>

            <label for="imageCompany">{{__('profile.Company Logo')}}</label>
            <input type="file" name="imageCompany" class="form-control">
            <button type="submit"
                    class="btn btn-success">
                    {{__('profile.ADD')}}
            </button>
        </form>
    </div>
</div>

