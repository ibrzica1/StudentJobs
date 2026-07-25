<form action="{{route('profile.update.user-education')}}" method="post">
@csrf
@method('PATCH')

<h6 class="text-uppercase text-muted fw-bold mb-3 mt-5">
    Education
</h6>

<div class="mb-3">
    <label class="form-label">University</label>
    <textarea name="university" class="form-control
        custom-input" rows="8">{{$user->university}}</textarea>
</div>

    <div class="mb-3">
    <label class="form-label">Certificates</label>
    <textarea name="certificates" class="form-control
        custom-input" rows="8">{{$user->certificates}}</textarea>
</div>

<button
    type="submit"
    class="btn btn-success btn-lg w-100 py-3">
    SAVE CHANGES
</button>
</form>