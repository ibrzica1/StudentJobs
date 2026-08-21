<form action="/company/delete/{{$company->id}}" method="post">
@csrf
@method('DELETE')
<button type="submit"
        class="btn btn-danger my-2">
    {{__('profile.DELETE')}}
</button>
</form>