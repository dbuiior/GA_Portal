<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        // Jika sudah login, arahkan sesuai role
        if (Auth::check()) {
            $user = Auth::user();
            return redirect($user->role === 'admin' ? '/admin/home' : '/home');
        }

        return view('user.login');
    }

    // Proses login
   public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Ambil hanya email dan password
    $credentials = $request->only('email', 'password');

    // Coba login
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            // Pastikan route admin.hub ada
            return redirect()->route('admin.hub')->with('success', 'Login berhasil sebagai admin!');
        }

        // Untuk user biasa → arahkan ke '/' atau route user.hub (jika ada)
        if (Route::has('user.hub')) {
            return redirect()->route('user.hub')->with('success', 'Login berhasil!');
        }

        // Fallback ke '/' kalau route user.hub belum ada
        return redirect('/')->with('success', 'Login berhasil!');
    }

    // Jika gagal login
    return back()->with('failed', 'Email atau password salah.');
}
    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah logout.');
    }
}
