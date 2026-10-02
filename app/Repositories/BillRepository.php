<?php

namespace App\Repositories;

use App\Models\Bill;
use Illuminate\Http\Request;

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
            'status' => $array['status']
        ]);
    }

    public function updatePdf(int $billId, string $pdfPath): Bill
    {
        $bill = $this->billModel->findOrFail($billId);
        $bill->update([
            'pdf' => $pdfPath
        ]);
        return $bill;
    }
}