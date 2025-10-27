<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();
        if ($user->role !== $role) {
            return redirect('/unauthorized')->with('error', 'Akses ditolak!');
        }

        return $next($request);
    }
}
