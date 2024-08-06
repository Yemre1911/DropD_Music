<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\PersonalAccessToken;

class ApiTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $token = $request->bearerToken();

        if ($token)
        {
            $tokenRecord = PersonalAccessToken::where('token', hash('sha256', $token))->first();
            if($tokenRecord)
                return $next($request);
            else
            return response()->json(['error' => 'Token expired or invalid', 'message' => 'The token has expired or is invalid'], 401);

        }
            return response()->json(['error' => 'Token expired or invalid', 'message' => 'The token has expired or is invalid'], 401);
    }
}
