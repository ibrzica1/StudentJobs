<div>

    <div>
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
    </div>

    <div class="d-flex">
        <div class="d-flex flex-column align-items-start">
            <p>{{$bill->user->firstName}} {{$bill->user->lastName}}</p>
            <p>{{$bill->user->street}} {{$bill->user->house_number}}</p>
            <p>{{$bill->location->city}}</p>
        </div>

        <div class="d-flex flex-column align-items-end">
            <p>{{__('jobBillPdf.Company')}}</p>
            <p>{{$_ENV['COMPANY_NAME']}}</p>
            <p>{{$_ENV['COMPANY_STREET']}}</p>
            <p>{{$_ENV['COMPANY_POSTAL_CODE']}} {{$_ENV['COMPANY_CITY']}}</p>
            <p>{{$_ENV['COMPANY_COUNTRY']}}</p>
            <p>{{__('jobBillPdf.Contact')}}</p>
            <p>{{$_ENV['COMPANY_TELEPHONE']}}</p>
            <p>{{$_ENV['COMPANY_EMAIL']}}</p>
            <p>{{$_ENV['COMPANY_URL']}}</p>
        </div>
    </div>

    <div>
        <h1>{{__('jobBillPdf.Invoice')}}</h1>
        <div class="d-flex flex-column">
            <p><span>{{__('jobBillPdf.Invoice')}}:</span> </p>
        </div>
    </div>

</div>