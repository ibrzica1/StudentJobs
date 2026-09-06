<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\JobCreatedMail;
use App\Mail\WelcomeEmail;
use App\Repositories\JobRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendWelcomeMail(): RedirectResponse
    {
        $user = Auth::user();
        Mail::to('test@inbox.mailtrap.io')->send(new WelcomeEmail($user));
        return redirect()->route('homepage');
    }

    public function sendJobCreatedMail(): RedirectResponse
    {
        $jobRepo = new JobRepository();
        $job = $jobRepo->getJob(4);
        Mail::to('test@inbox.mailtrap.io')->send(new JobCreatedMail($job));
        return redirect()->route('homepage');
    }
}
