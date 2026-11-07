<?php

namespace App\Services;

use App\Interfaces\PDFInterface;
use App\Models\Bill;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Storage;

class PDFStorageService implements PDFInterface
{
    public function createAndStoreJobBillPDF(Bill $bill): string
    {
        $pdf = FacadePdf::loadView('pdf.jobBillPDF',['bill' => $bill]);
        $path = 'documents/job-bills/'.$bill->bill_number.'.pdf';
        Storage::disk('public')->put($path,$pdf->output());
        return $path;
    }
}