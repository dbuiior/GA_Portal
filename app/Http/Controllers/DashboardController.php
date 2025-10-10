<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function user_ticket_dashboard()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $newCount = Ticket::where('user_id', Auth::id())
                  ->where('status', 'open')
                  ->count();
            $inProgressCount = Ticket::where('user_id', Auth::id())
                  ->where('status', 'in_progress')
                  ->count();
            $closedCount = Ticket::where('user_id', Auth::id())
                  ->where('status', 'closed')
                  ->count();
        } 
        else {
            $newCount = Ticket::where('user_id', $user->id)->where('status', 'open')->count();
            $inProgressCount = Ticket::where('user_id', $user->id)->where('status', 'in_progress')->count();
            $closedCount = Ticket::where('user_id', $user->id)->where('status', 'closed')->count();
        }
        return view('user.home', compact('newCount', 'inProgressCount', 'closedCount'));
    }
}
