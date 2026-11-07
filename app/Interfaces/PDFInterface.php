<?php

namespace App\Interfaces;

use App\Models\Bill;

interface PDFInterface
{
    public function createAndStoreJobBillPDF(Bill $bill): string;
}