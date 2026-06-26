<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyInfoUpdateRequest;
use App\Http\Requests\CompanyLogoUpdateRequest;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    private $companyRepo; 

    public function __construct()
    {
        $this->companyRepo =  new CompanyRepository();
    }

    public function updateLogo(CompanyLogoUpdateRequest $request): RedirectResponse
    {
        $company = $this->companyRepo->getCompany($request->companyId);
        Storage::disk('public')->delete('images/company_logo/'.$company->logo);
        $path = $request->companyLogo->store('images/company_logo','public');
        $logo = basename($path);
        $this->companyRepo->updateLogo($logo,$request->user()->id);
        return Redirect::route('profile.edit')->with('status', 'logo-updated');
    }

    public function updateCompanyInfo(CompanyInfoUpdateRequest $request): RedirectResponse
    {
        $this->companyRepo->updateInfo($request);
        return Redirect::route('profile.edit')->with('status', 'company-info-updated');
    }
}
