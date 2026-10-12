@extends("layout")

@section("pageTitle")
    My Bills
@endsection

@section("content")
<?php 
use Carbon\Carbon;
use App\Models\Bill;
?>
<style>
    .hover-darken {
        transition: background-color 0.3s ease;
    }
    .hover-darken:hover {
        background-color: rgba(0, 0, 0, 0.1); 
    }
</style>

<body class="bg-body-secondary">
<h6 class="text-uppercase text-muted fw-bold mt-3 mb-3 mx-4 my-5">
    {{__('myBills.My Bills')}}
</h6>

@foreach ($bills as $bill)
    
<div class="d-flex flex-column justify-content-center align-items-center">

    @foreach ($bills as $bill)
        <div class="d-flex container row m-3 justify-content-center bg-white rounded p-3 shadow">
            <h2 class="d-flex col-10 col-md-10 col-lg-3 col-xl-3 text-center justify-content-center 
                    align-items-center fst-italic">
                {{$bill->bill_number}}
            </h2>
            <div class="d-flex flex-column col-10 col-md-3 col-lg-3 col-xl-3 justify-content-center align-items-center
                        gap-3">
                <p class="text-center fw-bold text-truncate">{{$bill->job->title}}</p>
                <p class="text-center text-muted">{{__('myBills.issued')}} {{Carbon::parse($bill->created_at)->format('M d Y')}}</p>
            </div>
            <div class="d-flex flex-column col-10 col-md-4 col-lg-3 col-xl-3 justify-content-center 
            align-items-center gap-3">
                <p class="text-center fw-bold">€ {{$bill->amount}}</p>
                @if ($bill->status === Bill::PAYED)
                    <div class="text-center bg-success p-3">
                       {{__('myBills.PAID')}} 
                    </div>
                @elseif ($bill->status === Bill::UNPAYED)
                <div class="d-flex align-items-center justify-content-around p-1 px-2 rounded"
                    style="background-color: blanchedalmond;">
                    <p style="color:chocolate; font-weight:bold">
                       {{__('myBills.UNPAID')}} 
                    </p>
                </div>
                @endif
                
            </div>
            <div class="d-flex col-10 col-md-3 col-lg-3 col-xl-3 justify-content-center align-items-center"
                >
                <a href="{{route('bill.download',['path' => $bill->bill_number])}}"
                class="hover-darken p-2 rounded">
                    <img src="{{asset('storage/images/icons/pdf.png')}}"
                    width="60"
                    height="60"
                    style="object-fit: cover;">
                </a>
            </div>
        </div>
    @endforeach

</div>

@endforeach
</body>
@endsection