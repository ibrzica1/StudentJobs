<?php

namespace App\Services;

use App\Models\Bill;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;

class PDFService
{
    public function createJobBillPDF(Bill $bill): PDF
    {
        return FacadePdf::loadView('pdf.jobBillPDF',['bill' => $bill]);
    }
}