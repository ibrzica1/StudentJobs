<?php

use App\Enums\JobCategories;
use App\Enums\JobTypesEnum;
?>

<div class="d-flex flex-column w-100 mt-5 p-4 text-white"
    style="background-color: rgb(28, 128, 169);">
    <div class="d-flex d-flex justify-content-around">
        <div>
            <div class="d-flex justify-content-center align-items-center border-bottom">
                <img src="{{ asset('storage/images/icons/PageLogo.png') }}"
                    alt="Logo"
                    class="h-[85px] object-contain">
            </div>
            <div class="d-flex flex-column gap-2 py-2">
                <p>{{env('COMPANY_NAME')}}</p>
                <p>{{env('COMPANY_STREET')}}</p>
                <p>{{env('COMPANY_POSTAL_CODE')}}</p>
                <p>{{env('COMPANY_CITY')}}</p>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-center align-items-center pt-3 pb-4 border-bottom">
                <img src="{{ asset('storage/images/icons/phone.png') }}"
                    alt="Logo"
                    class="h-[45px] object-contain">
            </div>
            <div class="d-flex flex-column gap-2 py-2">
                <p class="text-center h4 fw-bold">{{env('COMPANY_TELEPHONE')}}</p>
                <p class="text-center fw-bold">{{__('footer.Mon')}}-{{__('footer.Sun')}}: 08:00 - 19:00</p>
            </div>
        </div>
        <div class="d-flex flex-column pt-2">
            <div class="pt-4 pb-4 border-bottom text-center h5">
                <p>{{__('footer.FOR EMPLOYERS')}}</p>
            </div>
            <div class="d-flex flex-column gap-2 py-2">
                <a href="{{route('job.categories',['jobType' => JobTypesEnum::HELPER_JOB->value])}}">
                    {{__('footer.Student Placement')}}
                </a>
                <a href="{{route('job.helper.create',['category' => JobCategories::MOVING_HELPER->value])}}">
                    {{__('footer.Book Moving Helpers')}}
                </a>
                <a href="{{route('job.helper.create',['category' => JobCategories::DECLUTTER_HELPER->value])}}">
                    {{__('footer.Book Declutter Helpers')}}
                </a>
            </div>
        </div>
    </div>

    <div class="text-center">
        <p>
            Copyright © {{env('COMPANY_NAME')}} / 2025 -2026. {{__('footer.All rights reserved.')}}
        </p>
    </div>
</div>