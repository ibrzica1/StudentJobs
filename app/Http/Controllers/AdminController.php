<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\BillRepository;
use App\Services\GetStatisticsDataService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private BillRepository $billRepo;
    private GetStatisticsDataService $statisticDataService;

    public function __construct()
    {
        $this->billRepo = new BillRepository();
        $this->statisticDataService = new GetStatisticsDataService();
    }

    public function dashboard()
    {
        $unpaidBills = $this->billRepo->getAllUnpaidBills();
        $statisticData = $this->statisticDataService->getData();
        return view('adminDashboard',['unpaidBills' => $unpaidBills, 'statistics' => $statisticData]);
    }
}
