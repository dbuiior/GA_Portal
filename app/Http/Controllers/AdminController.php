<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Question;

class AdminController extends Controller
{
    public function show_all_ticket(){
        $tickets = Question::all();
        return view('admin.home', compact('tickets'));
    }
}
