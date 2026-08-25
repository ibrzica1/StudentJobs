<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Localization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LocalizationController extends Controller
{
    private object $localization;

    public function __construct()
    {
        $this->localization = new Localization();
    }

    public function setLocale(string $locale): RedirectResponse
    {
        $this->localization->changeLocale($locale);
        return redirect()->back();
    }
}
