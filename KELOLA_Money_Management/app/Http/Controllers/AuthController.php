<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        // Jika otentikasi berhasil, simpan informasi pengguna ke dalam sesi
        $user = Auth::user();
        session(['user_fullname' => $user->fullname, 'user_email' => $user->email]);
        
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['username' => 'Invalid credentials']);
}

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect('/login');
    }    

    public function logout(Request $request)
    {
        Auth::logout(); // Menghapus otentikasi pengguna saat ini
        $request->session()->invalidate(); // Menghapus sesi pengguna
        $request->session()->regenerateToken(); // Me-generate token sesi baru
        
        return redirect('/login'); // Redirect pengguna ke halaman login setelah logout
    }
}
