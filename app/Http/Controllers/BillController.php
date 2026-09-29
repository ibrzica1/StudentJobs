<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\BillRepository;
use Illuminate\Http\Request;

class BillController extends Controller
{
    private BillRepository $billRepo;

    public function __construct()
    {
        $this->billRepo = new BillRepository();
    }
}
