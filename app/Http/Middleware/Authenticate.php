<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
         return $request->expectsJson() ? null : route('login');
        // dd(Auth::user()->user_type);
        // if ($request->expectsJson() == null && Auth::check() && Auth::user()->user_type == 2){
        //     // return redirect()->route('dashboard');
        //     return $next($request);
        // }
        // else{
        //     return redirect()->route('login');
        // }

    }
}
