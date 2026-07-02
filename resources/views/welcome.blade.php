@extends("layout")

@section("pageTitle")
    Main page
@endsection

@section("content")

@foreach ($jobs as $job)
    <div>
        <div></div>

        <div>

            <div></div>
            <div>

                <div></div>
                <div></div>
                <div></div>

            </div>
        </div>
    </div>
@endforeach

<div>{{$jobs->links()}}</div>

@endsection