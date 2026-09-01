<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class JobBelongsToUser
{
     public function handle(Request $request, Closure $next): Response
    {
        $job = $request->route('job');
        if(Auth::id() !== $job->employer_id){
            return redirect()
            ->route('homepage')
            ->withErrors('You have to be creator of the job');
        }
        return $next($request);
    }
}
