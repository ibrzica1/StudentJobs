<form action="{{route('profile.update.company-info')}}" method="post">
@csrf
@method('PATCH')


<h6 class="text-uppercase text-muted fw-bold my-2 mb-3">
    Company Info
</h6>

<div class="mb-4">
    <input type="hidden" name="companyId" value="{{$company->id}}">
    <input
        type="file"
        name="companyLogo"
        class="form-control"
    >
</div>

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