<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $kimlikBilgileri = $request->headers->get('authorization');

         if (preg_match('/^Basic\s(\S+)/', $kimlikBilgileri, $matches))     // Authorization başlığında 'Basic ' öneki var mı kontrol et
         {
            $decodedCredentials = base64_decode($matches[1]);               // Base64 kodlamasını çöz

            [$email, $password] = explode(':', $decodedCredentials);        // Kullanıcı adı ve şifreyi ayır

            $user = DB::table('users')->where('email', $email)->first();


            if ($user && Hash::check($password, $user->password))      // Doğrulama başarılıysa isteği işleme devam et
            {
                if($user->is_admin == 1)
                    return $next($request);
                else
                    return response()->json(['message'=>'Kullanici Admin Degil!']);
            }

            else
            {
                return response()->json(['message'=>'Yanlis Kullanici Bilgileri!']);
            }
        }

        else
            return response()->json(['message'=>'Kullanici Bilgileri Headerda Bulunamadı!']);

    }
}
