<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\BillRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $billRepo;

    public function __construct()
    {
        $this->billRepo = new BillRepository();
    }

    public function dashboard()
    {
        $unpaidBills = $this->billRepo->getAllUnpaidBills();
        return view('adminDashboard',['unpaidBills' => $unpaidBills]);
    }
}
