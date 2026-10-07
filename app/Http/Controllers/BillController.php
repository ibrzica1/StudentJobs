<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Repositories\BillRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BillController extends Controller
{
    private BillRepository $billRepo;

    public function __construct()
    {
        $this->billRepo = new BillRepository();
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
}
