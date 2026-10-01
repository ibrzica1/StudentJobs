<?php

namespace App\Listeners;

use App\Events\BillCreatedEvent;
use App\Events\JobCreatedEvent;
use App\Models\Bill;
use App\Repositories\BillRepository;
use App\Services\MoneyService;
use App\Services\PDFService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class CreateJobBillListener
{
    private BillRepository $billRepo;
    private MoneyService $moneyService;
    public PDFService $pdfservice;

    public function __construct()
    {
        $this->billRepo = new BillRepository();
        $this->moneyService = new MoneyService();
        $this->pdfservice = new PDFService();
    }

    public function handle(JobCreatedEvent $event): void
    {
        $total = $this->moneyService->calculatePrice(Bill::JOB_AD_PRICE,Bill::TAX);
        $bill = $this->billRepo->store($event->job->employer_id, $event->job->id, $total);
        $pdf = $this->pdfservice->createJobBillPDF($bill);
        
        Storage::disk('public');
        event(new BillCreatedEvent($bill));
    }
}
