<?php

namespace App\Http\Controllers;

use App\Events\RatingCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRatingRequest;
use App\Repositories\RatingRepository;
use App\Services\RateStudentService;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    private object $ratingRepo;
    private RateStudentService $rateStudentService;

    public function __construct()
    {
        $this->ratingRepo = new RatingRepository();
        $this->rateStudentService = new RateStudentService();
    }

    public function store(CreateRatingRequest $request)
    {
        $this->rateStudentService->rateStudent($request->validated());
        return redirect()->route('job.my-ads',['status'=>'all']);
    }
}
