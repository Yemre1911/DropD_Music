<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('MyApp')->plainTextToken;
        return redirect()->route('login_page')->with('success', 'Registration successful!');

    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([           // $validated, kullanıcının kendisi aslında, sadece taramadan geçiyor

            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if(auth()->attempt($validated)) // eğer veri tabanında bu mail ve şifreye sahip biri var ise = 1 yoksa = 0
        {
            request()->session()->regenerate(); // önceki oturum açmış biri varsa temizlik yapılıyor
            return redirect()->route('anasayfa');
        }

        else
        {
            return redirect()->route('login_page')->withErrors(['email'=> "Invalid E-Mail"]);
        }
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();          // geçersiz kılmak, şu anki oturumu
        request()->session()->regenerateToken();    //csrf tokenini yeniler, günvelik için yapılır
        return redirect()->route('anasayfa');
    }
}
