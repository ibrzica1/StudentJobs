<?php

namespace App\Repositories;

use App\Enums\BillStatusesEnum;
use App\Models\Bill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Void_;

class BillRepository
{
    private object $billModel;

    public function __construct()
    {
        $this->billModel = new Bill();
    }

    public function store(array $array): Bill
    {
        return $this->billModel->create([
            'user_id' => $array['user_id'],
            'job_id' => $array['job_id'],
            'amount' => $array['amount'],
            'status' => $array['status'],
            'bill_number' => $array['bill_number']
        ]);
    }

    public function getMyBills(): Collection
    {
        return $this->billModel->where('user_id',Auth::id())->get();
    }

    public function getAllUnpaidBills(): Collection
    {
        return $this->billModel->where('status',BillStatusesEnum::UNPAYED->value)->get();
    }

    public function markAsPaid(int $billId): void
    {
        $this->billModel->where('id',$billId)->update(['status' => BillStatusesEnum::PAYED->value]);
    }
}