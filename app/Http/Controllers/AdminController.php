<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BillRepositoryInterface;
use App\Interfaces\JobRepositoryInterface;
use App\Interfaces\VisitRepositoryInterface;
use App\Repositories\BillRepository;
use App\Services\GetStatisticsDataService;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private BillRepositoryInterface $billRepo;
    private GetStatisticsDataService $statisticDataService;


    public function __construct(
        BillRepositoryInterface $billRepositoryInterface,
        VisitRepositoryInterface $visitRepositoryInterface,
        JobRepositoryInterface $jobRepositoryInterface,
        Repository $cache
    )
    {
        $this->billRepo = $billRepositoryInterface;
        $this->statisticDataService = new GetStatisticsDataService($visitRepositoryInterface, $jobRepositoryInterface, $cache);
    }

    public function dashboard()
    {
        $unpaidBills = $this->billRepo->getAllUnpaidBills();
        $statisticData = $this->statisticDataService->getData();
        return view('adminDashboard',['unpaidBills' => $unpaidBills, 'statistics' => $statisticData]);
    }
}
