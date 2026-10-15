<?php

namespace App\Models;

use App\Enums\LocalizationEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization extends Model
{

    public function changeLocale(string $locale): void
    {
        if(in_array($locale,LocalizationEnum::cases())){
            App::setLocale($locale);
            Session::put('locale',$locale);
        }
    }
}
