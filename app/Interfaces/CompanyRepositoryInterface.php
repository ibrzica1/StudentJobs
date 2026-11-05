<?php

namespace App\Interfaces;

use App\Models\Company;

interface CompanyRepositoryInterface
{
    public function getCompany(int $id): Company;
    public function getUserCompanies(int $userId): object;
    public function store(array $request, int $userId): Company;
    public function updateInfo(object $request): void;
    public function updateLogo(string $logo, int $id): void;
    public function deleteCompany(Company $company): void;

}