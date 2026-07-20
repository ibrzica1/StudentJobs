<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmployerCheckMiddleware
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role !== 'employer'){
            return redirect()
            ->route('homepage')
            ->withErrors('You have to register as employer');
        }
        return $next($request);
    }
}
