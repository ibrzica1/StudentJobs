<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyRepository
{
    private $companyModel;

    public function __construct()
    {
        $this->companyModel = new Company();
    }

   public function getCompany(int $id)
   {
        return $this->companyModel->whereId($id)->first();

   }

   public function store($request, $userId)
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

   public function updateLogo(string $logo, int $id)
   {
        $this->companyModel->where('user_id',$id)->update([
            'logo' => $logo,
        ]);
   }


}