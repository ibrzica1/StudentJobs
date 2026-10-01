<?php

namespace App\Repositories;

use App\Models\Bill;

class BillRepository
{
    private object $billModel;

    public function __construct()
    {
        $this->billModel = new Bill();
    }

    public function store(int $userId, int $jobId, float $amount): Bill
    {
        return $this->billModel->create([
            'user_id' => $userId,
            'job_id' => $jobId,
            'amount' => $amount,
            'status' => Bill::UNPAYED
        ]);
    }
}