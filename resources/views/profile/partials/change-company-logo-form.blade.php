<form action="{{route('profile.update.company-logo')}}"
method="post"
enctype="multipart/form-data">
@csrf
@method('PATCH')


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
    <input type="hidden" name="companyId" value="{{$company->id}}">
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