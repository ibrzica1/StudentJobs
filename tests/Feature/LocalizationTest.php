<?php

use App\Models\Localization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('can change locale', function() {
    $locale = App::getLocale();
    $newLocale = array_rand(array_filter(Localization::ALLOWED_LOCALE, fn($item) => $item != $locale));
    $this->get(route('locale.set',$newLocale));
    $this->assertNotSame($newLocale,$locale);
});