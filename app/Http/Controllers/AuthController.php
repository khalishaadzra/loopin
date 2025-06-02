<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password; // Untuk validasi password yang lebih baik

class AuthController extends Controller
{
    public function showSignup()
    {
        return view('loopin.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'nullable|string|max:500', 
            'password' => ['required', 'confirmed', Password::min(6)->mixedCase()->numbers()], 
        ]);

        // Buat nama lengkap jika diperlukan untuk field 'name' (jika kamu masih punya kolom 'name')
        // $fullName = $request->first_name . ($request->last_name ? ' ' . $request->last_name : '');

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            // 'name' => $fullName, // Jika masih ada kolom 'name'
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan masuk.');
    }

    public function showLogin()
    {
        return view('loopin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([ // Validasi input login
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) { 
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); 
    }
}