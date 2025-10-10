<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin/home')->with('success', 'Login berhasil sebagai admin!');
            }

            return redirect('/home')->with('success', 'Login berhasil!');
        }
        return back()->with('failed', 'Email atau password salah.');
    }
}
