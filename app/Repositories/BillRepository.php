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
}