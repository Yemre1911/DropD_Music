<?php

// app/Http/Middleware/CheckAbilities.php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;  // Log sınıfını import ettik
use Laravel\Sanctum\PersonalAccessToken;

use Closure;
use Illuminate\Http\Request;

class CheckAbilitiesMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $token = $request->bearerToken();

        //Log::info("TEST");
        //Log::info("User Object:", ['user' => $user]);
        //Log::info("Bearer Token:", ['token' => $token]);

        if ($token) {
            // Token'ı hash'le ve veritabanında ara
            $tokenRecord = PersonalAccessToken::where('token', hash('sha256', $token))->first();

            if ($tokenRecord) {
                // Token izinlerini logla
                Log::info('Kullanıcı yetkileri:', ['abilities' => $tokenRecord->abilities]);

                if ($tokenRecord->can('*')) {
                    return $next($request);
                }
            }
        }

        return response()->json(["message" => 'You have token but do not have permission to perform this action'], 403);
    }
}
