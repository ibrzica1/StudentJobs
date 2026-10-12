@extends("layout")

@section("pageTitle")
    Admin Dashboadr
@endsection

@section("content")
<?php 
use Carbon\Carbon;
?>
    <body class="bg-body-secondary">
    <div class="d-flex mt-3 mx-2 gap-2">
        <div class="d-flex flex-column align-items-start  p-2 rounded gap-2 border-end border-2">
            <h2 class="bg-white p-2 rounded fw-bold shadow">{{__('adminDashboard.Statistics')}}</h2>
            <div class="bg-white p-2 rounded shadow">{{__('adminDashboard.Visits Today')}}</div>
            <div class="bg-white p-2 rounded shadow">{{__('adminDashboard.Visits This Month')}}</div>
            <div class="bg-white p-2 rounded shadow">{{__('adminDashboard.Total Visits')}}</div>
            <div class="bg-white p-2 rounded shadow">{{__('adminDashboard.New Jobs Today')}}</div>
            <div class="bg-white p-2 rounded shadow">{{__('adminDashboard.Jobs This Month')}}</div>
        </div>

        <div d-flex flex-column align-items-start p-2>
            <h2 class="bg-white p-3 rounded mx-3 fw-bold w-auto shadow">{{__('adminDashboard.Unpaid Bills')}}</h2>
            @foreach ($unpaidBills as $bill)
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
                    </div>
                    <div class="d-flex col-10 col-md-3 col-lg-3 col-xl-3 justify-content-center align-items-center">
                        <a href="*" 
                            class="btn btn-warning btn-sm">
                                {{__('adminDashboard.Mark As Paid')}}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection