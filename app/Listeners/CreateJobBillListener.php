<?php

namespace App\Listeners;

use App\Events\BillCreatedEvent;
use App\Events\JobCreatedEvent;
use App\Models\Bill;
use App\Repositories\BillRepository;
use App\Services\MoneyService;
use App\Services\PDFService;


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
        $billNumber = 'bill-job/'.$event->job->id.'/'.time().'.pdf';
        $bill = $this->billRepo->store([
            'user_id' => $event->job->employer_id,
            'job_id' => $event->job->id,
            'amount' => $total,
            'status' => Bill::UNPAYED,
            'bill_number' => $billNumber
        ]);
        $this->pdfservice->createAndStoreJobBillPDF($bill);
        
        event(new BillCreatedEvent($bill));
    }
}
