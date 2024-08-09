<?php

// app/Http/Middleware/CheckAbilities.php
namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;  // Log sınıfını import ettik
use Laravel\Sanctum\PersonalAccessToken;

use Closure;
use Illuminate\Http\Request;

class CheckAbilitiesMiddleware
{

    public function handle(Request $request, Closure $next, $ability)
    {
        $user = $request->user();
        $token = $request->bearerToken();

        Log::info("Requested Ability (in handle): " .$ability);


        if ($token) {
            // Token'ı hash'le ve veritabanında ara
            $tokenRecord = PersonalAccessToken::where('token', hash('sha256', $token))->first();

            if ($tokenRecord && $tokenRecord->can($ability)) {
                // Token izinlerini logla
                Log::info('Kullanici yetkileri:', ['abilities' => $tokenRecord->abilities]);

                return $next($request);
            }
        }

        return response()->json(["message" => 'You have token but do not have permission to perform this action'], 403);
    }
}
