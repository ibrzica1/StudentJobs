<?php


it('can change locale', function() {
    $locale = getLocale();
    $newLocale = getRandomNewLocale($locale);
    $this->get(route('locale.set',$newLocale));
    $this->assertNotSame($newLocale,$locale);
});