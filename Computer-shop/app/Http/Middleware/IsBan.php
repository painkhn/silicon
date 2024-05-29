<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class IsBan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next) {
        if (Auth::user() &&  Auth::user()->ban == 0) {
            return $next($request);
        }
        elseif (!Auth::check()) {
            return $next($request);
        }
        else{
            $response = response()->view('auth.login');
            $response->withCookie(cookie('name', 'value', 60));
            return $response;
        }
    }
}
