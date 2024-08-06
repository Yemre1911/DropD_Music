<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CountryMiddleware                 // THIS MIDDLEWARE WAS A TEST AND IS NOT BEING USE
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $country = Auth::user()->country;
        if($country!="Turkey")
        {
            return redirect()->route('anasayfa');
        }
        return $next($request);
    }
}
