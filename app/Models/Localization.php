<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization extends Model
{
    
    const ENGLISH = "en";
    const CROATIAN = "hr";
    const GERMAN = "de";

    const ALLOWED_LOCALE = [
        self::ENGLISH, self::CROATIAN, self::GERMAN
    ];

    public function changeLocale(string $locale): void
    {
        if(in_array($locale,self::ALLOWED_LOCALE)){
            App::setLocale($locale);
            Session::put('locale',$locale);
        }
    }
}
