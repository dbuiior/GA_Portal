<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ticket;

class AdminController extends Controller
{
    public function show_all_ticket(){
        $tickets = Ticket::all();
        return view('admin.home', compact('tickets'));
    }
}
