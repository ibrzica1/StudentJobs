
<div>
    <button class="btn btn-primary"
            wire:click="$wire.toggleAddCompany">
        ADD COMPANY
    </button>
    <div wire:show="showAddCompany">
        <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="companyName">Company Name</label>
             <div class="input-group">
                <span class="input-group-text"><img src="{{ asset('storage/images/icons/company.svg') }}" style="width: 20px;"></span>
                <input type="text" name="companyName" class="form-control custom-input" required>
            </div>

            <label for="imageCompany">Company Logo</label>
            <input type="file" name="imageCompany" class="form-control">
            <button type="submit"
                    class="btn btn-success">
                    ADD
            </button>
        </form>
    </div>
</div>

