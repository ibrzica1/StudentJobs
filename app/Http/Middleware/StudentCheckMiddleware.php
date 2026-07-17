<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StudentCheckMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role !== 'student'){
            return redirect()->route('homepage');
        }
        return $next($request);
    }
}
