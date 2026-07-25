<form action="/company/delete/{{$company->id}}" method="post">
@csrf
@method('DELETE')
<button type="submit"
        class="btn btn-danger">
    DELETE
</button>
</form>