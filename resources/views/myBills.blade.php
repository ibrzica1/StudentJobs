@extends("layout")

@section("pageTitle")
    My Bills
@endsection

@section("content")
  
@foreach ($bills as $bill)
    
<div>

    <h1>My Bills</h1>

    @foreach ($bills as $bill)
    <div class="container row">
        <div class="col-lg-4">

            <div>
                <p>Invoice</p>
                <p>{{$bill->bill_number}}</p>
            </div>

            <div>
                <p>Status</p>
                <p>{{$bill->status}}</p>
            </div>

        </div>
    </div>
    @endforeach

</div>

@endforeach
   
@endsection