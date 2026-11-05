<?php

namespace App\Listeners;

use App\Enums\BillPricesEnum;
use App\Enums\BillStatusesEnum;
use App\Events\BillCreatedEvent;
use App\Events\JobCreatedEvent;
use App\Interfaces\BillRepositoryInterface;
use App\Services\MoneyService;
use App\Services\PDFService;


class CreateJobBillListener
{
    private BillRepositoryInterface $billRepo;
    private MoneyService $moneyService;
    public PDFService $pdfservice;

    public function __construct(BillRepositoryInterface $billRepositoryInterface)
    {
        $this->billRepo = $billRepositoryInterface;
        $this->moneyService = new MoneyService();
        $this->pdfservice = new PDFService();
    }

    public function handle(JobCreatedEvent $event): void
    {
        $total = $this->moneyService->calculatePrice(BillPricesEnum::JOB_AD_PRICE->JobAdFloatPrice(), BillPricesEnum::TAX->TaxFloatPrice());
        $billNumber = 'bill-job-'.$event->job->id.'-'.time();
        $bill = $this->billRepo->store([
            'user_id' => $event->job->employer_id,
            'job_id' => $event->job->id,
            'amount' => $total,
            'status' => BillStatusesEnum::UNPAYED->value,
            'bill_number' => $billNumber
        ]);
        $this->pdfservice->createAndStoreJobBillPDF($bill);
        
        event(new BillCreatedEvent($bill));
    }
}
