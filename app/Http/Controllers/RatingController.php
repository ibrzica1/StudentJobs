<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRatingRequest;
use App\Repositories\RatingRepository;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    private object $ratingRepo;

    public function __construct()
    {
        $this->ratingRepo = new RatingRepository();
    }

    public function store(CreateRatingRequest $request)
    {
        $this->ratingRepo->store($request->validated());
        return redirect()->route('job.my-ads',['status'=>'all']);
    }
}
