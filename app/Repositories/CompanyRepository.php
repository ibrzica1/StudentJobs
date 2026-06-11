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

   public function store($request, $userId)
   {
        $company = $this->companyModel::create([
           'name' => $request['companyName'],
           'logo' => $request['logo'],
           'user_id' => $userId,
       ]);

       return $company;
   }
}