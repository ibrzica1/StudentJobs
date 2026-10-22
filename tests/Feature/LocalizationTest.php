<?php

use App\Enums\LocalizationEnum;
use App\Models\Localization;
use Illuminate\Support\Facades\App;


it('can change locale', function() {
    $locale = App::getLocale();
    $newLocale = array_rand(array_filter(LocalizationEnum::cases(), fn($item) => $item != $locale));
    $this->get(route('locale.set',$newLocale));
    $this->assertNotSame($newLocale,$locale);
});