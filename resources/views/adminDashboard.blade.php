@extends("layout")

@section("pageTitle")
    Admin Dashboadr
@endsection

@section("content")
    <?php 
    use Carbon\Carbon;
    ?>
    
    <body class="bg-body-secondary">

    @if($errors->any())
        <div class="alert alert-danger text-center">{{$errors->first()}}</div>
    @endif

    <div class="d-flex container row mt-3 mx-2 gap-2">
        <div class="d-flex flex-column align-items-center  p-2 rounded gap-3 border-end border-2
                    col-10 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            <h2 class="bg-white p-2 px-3 rounded fw-bold shadow">{{__('adminDashboard.Statistics')}}</h2>
            <div class="d-flex bg-white p-2 rounded shadow gap-2 align-items-center">
                <div class="d-flex align-items-center justify-content-center rounded-circle bg-body-secondary flex-shrink-0" style="width: 40px; height: 40px;">
                    <img src="{{ asset('storage/images/icons/today.png') }}"
                        class="rounded-circle"
                        width="20"
                        height="20"
                        style="object-fit: cover;">
                </div>
                <div>
                    <p class="fst-italic mb-0">{{__('adminDashboard.Visits Today')}}</p>
                    <p class="fw-bold text-center mb-0">{{$statistics['todayVisits']}}</p>
                </div>
            </div>
            <div class="d-flex bg-white p-2 rounded shadow gap-2 align-items-center">
                <div class="d-flex align-items-center justify-content-center rounded-circle bg-body-secondary flex-shrink-0" style="width: 40px; height: 40px;">
                    <img src="{{ asset('storage/images/icons/month.png') }}"
                        class="rounded-circle"
                        width="20"
                        height="20"
                        style="object-fit: cover;">
                </div>
                <div>
                    <p class="fst-italic mb-0">{{__('adminDashboard.Visits This Month')}}</p>
                    <p class="fw-bold text-center mb-0">{{$statistics['thisMonthVisits']}}</p>
                </div>
            </div>
            <div class="d-flex bg-white p-2 rounded shadow gap-2 align-items-center">
                <div class="d-flex align-items-center justify-content-center rounded-circle bg-body-secondary flex-shrink-0" style="width: 40px; height: 40px;">
                    <img src="{{ asset('storage/images/icons/total.png') }}"
                        class="rounded-circle"
                        width="20"
                        height="20"
                        style="object-fit: cover;">
                </div>
                <div>
                    <p class="fst-italic mb-0">{{__('adminDashboard.Total Visits')}}</p>
                    <p class="fw-bold text-center mb-0">{{$statistics['totalVisits']}}</p>
                </div>
            </div>
            <div class="d-flex bg-white p-2 rounded shadow gap-2 align-items-center">
                <div class="d-flex align-items-center justify-content-center rounded-circle bg-body-secondary flex-shrink-0" style="width: 40px; height: 40px;">
                    <img src="{{ asset('storage/images/icons/today.png') }}"
                        class="rounded-circle"
                        width="20"
                        height="20"
                        style="object-fit: cover;">
                </div>
                <div>
                    <p class="fst-italic mb-0">{{__('adminDashboard.New Jobs Today')}}</p>
                    <p class="fw-bold text-center mb-0">{{$statistics['todayJobs']}}</p>
                </div>
            </div>
            <div class="d-flex bg-white p-2 rounded shadow gap-2 align-items-center">
                <div class="d-flex align-items-center justify-content-center rounded-circle bg-body-secondary flex-shrink-0" style="width: 40px; height: 40px;">
                    <img src="{{ asset('storage/images/icons/month.png') }}"
                        class="rounded-circle"
                        width="20"
                        height="20"
                        style="object-fit: cover;">
                </div>
                <div>
                    <p class="fst-italic mb-0">{{__('adminDashboard.Jobs This Month')}}</p>
                    <p class="fw-bold text-center mb-0">{{$statistics['thisMonthJobs']}}</p>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column align-items-start p-2
                    col-10 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <h2 class="bg-white p-2 px-3 rounded mx-3 fw-bold w-auto shadow">{{__('adminDashboard.Unpaid Bills')}}</h2>
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
                        <p class="text-center">{{$bill->user->firstName}} {{$bill->user->lastName}}</p>
                    </div>
                    <div class="d-flex col-10 col-md-3 col-lg-3 col-xl-3 justify-content-center align-items-center">
                        <form action="{{route('bill.paid',['bill' => $bill->id])}}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit" class="btn btn-warning btn-sm">
                                {{__('adminDashboard.Mark As Paid')}}
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection