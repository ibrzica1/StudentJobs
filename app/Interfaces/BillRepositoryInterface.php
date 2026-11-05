<?php

namespace App\Interfaces;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Collection;

interface BillRepositoryInterface
{
    public function store(array $array): Bill;
    public function getMyBills(): Collection;
    public function getAllUnpaidBills(): Collection;
    public function markAsPaid(int $billId): void;
}