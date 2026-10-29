<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyInfoUpdateRequest;
use App\Http\Requests\CompanyLogoUpdateRequest;
use App\Http\Requests\CreateCompanyRequest;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use App\Services\StoreFileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    private CompanyRepository $companyRepo; 
    private StoreFileService $fileService;

    public function __construct()
    {
        $this->companyRepo =  new CompanyRepository();
        $this->fileService = new StoreFileService();
    }

    public function store(CreateCompanyRequest $request): RedirectResponse
    {
        $this->companyRepo->store($request->validated(),$request->user()->id);
        return Redirect::route('profile.edit')->with('status', 'company-created');
    }

    public function updateLogo(CompanyLogoUpdateRequest $request): RedirectResponse
    {
        $company = $this->companyRepo->getCompany($request->companyId);
        $logo = $this->fileService->updateLogo($company->logo,$request->validated());
        $this->companyRepo->updateLogo($logo,$request->user()->id);
        return Redirect::route('profile.edit')->with('status', 'logo-updated');
    }

    public function updateCompanyInfo(CompanyInfoUpdateRequest $request): RedirectResponse
    {
        $this->companyRepo->updateInfo($request);
        return Redirect::route('profile.edit')->with('status', 'company-info-updated');
    }

    public function deleteCompany(Company $company): RedirectResponse
    {
        $this->companyRepo->deleteCompany($company);
        return Redirect::route('profile.edit')->with('status', 'company-deleted');
    }
}
