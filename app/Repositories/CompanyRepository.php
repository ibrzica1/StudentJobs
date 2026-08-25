<?php

namespace App\Repositories;

use App\Models\Company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CompanyRepository
{
    private object $companyModel;

    public function __construct()
    {
        $this->companyModel = new Company();
    }

   public function getCompany(int $id): Company
   {
        return $this->companyModel->whereId($id)->first();
   }

   public function getUserCompanies(int $userId): array
   {
        return $this->companyModel->where('user_id',$userId)->get();
   }

   public function store(array $request, int $userId): Company
   {
        $logo = null;
        if($request['imageCompany']){
            $path = $request['imageCompany']->store('images/company_logo','public');
            $logo = basename($path);
        }

        $company = $this->companyModel::create([
           'name' => $request['companyName'],
           'logo' => $logo,
           'user_id' => $userId,
       ]);

       return $company;
   }

   public function updateInfo(object $request): void
   {
        $this->companyModel
        ->whereId($request->companyId)
        ->update([
            'name' => $request->companyName
        ]);
   }

   public function updateLogo(string $logo, int $id): void
   {
        $this->companyModel->where('user_id',$id)->update([
            'logo' => $logo,
        ]);
   }

   public function deleteCompany(Model $company): void
   {
        $company->delete();
   }
}