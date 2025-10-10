<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
   public function store(Request $request)
    {
        $request->validate([
            'main_issue' => 'required|string',
            'sub_issue'  => 'required|string',
        ]);

        $todayCount = Ticket::whereDate('created_at', now()->toDateString())->count() + 1;

        $queueNumber = 'TCK-' . now()->format('Ymd') . '-' . str_pad($todayCount, 4, '0', STR_PAD_LEFT);

        $ticket = Ticket::create([
            'issue'        => $request->main_issue,
            'sub_issue'    => $request->sub_issue,
            'user_id'      => Auth::id(),
            'queue_number' => $queueNumber,
        ]);

        return redirect()->route('customer.service')
                        ->with('success', 'Tiket berhasil dibuat! Nomor Antrian: ' . $ticket->queue_number);
    }

    public function show_Ticket()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('user.all_ticket', compact('tickets'));
    }
}
