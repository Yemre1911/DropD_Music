<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check())
        {
            $user=Auth::user();
            if($user->is_admin === 1)
            return $next($request);
        }

        return redirect()->route('admin_login');
    }
}
