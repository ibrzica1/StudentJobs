<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckMiddleware
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role !== 'admin'){
            return redirect()
            ->route('homepage')
            ->withErrors('You have to be admin');
        }
        return $next($request);
    }
}
