<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BillRepositoryInterface;
use App\Interfaces\StoreFileInterface;
use App\Models\Bill;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BillController extends Controller
{
    private BillRepositoryInterface $billRepo;
    private StoreFileInterface $fileInterface;

    public function __construct(
        BillRepositoryInterface $billRepositoryInterface,
        StoreFileInterface $storeFileInterface
    )
    {
        $this->billRepo = $billRepositoryInterface;
        $this->fileInterface = $storeFileInterface;
    }

    public function index(): View
    {
        $bills = $this->billRepo->getMyBills();
        return view('myBills',['bills' => $bills]);
    }

    public function download(string $fileName): StreamedResponse
    {
      return $this->fileInterface->download($fileName);
    }

    public function markAsPaid(Bill $bill)
    {
        $this->billRepo->markAsPaid($bill->id);
        return redirect()->route('admin.dashboard');
    }
}
