<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BillRepositoryInterface;
use App\Models\Bill;
use App\Repositories\BillRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BillController extends Controller
{
    private BillRepositoryInterface $billRepo;

    public function __construct(BillRepositoryInterface $billRepositoryInterface)
    {
        $this->billRepo = $billRepositoryInterface;
    }

    public function index(): View
    {
        $bills = $this->billRepo->getMyBills();
        return view('myBills',['bills' => $bills]);
    }

    public function download(string $fileName): StreamedResponse
    {
        $path = 'documents/job-bills/'.$fileName.'.pdf';

        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'File not found');
        }
        return Storage::disk('public')->download($path);
    }

    public function markAsPaid(Bill $bill)
    {
        $this->billRepo->markAsPaid($bill->id);
        return redirect()->route('admin.dashboard');
    }
}
