<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function categories()
    {
        $user = Auth::user();
        
        $category = Category::all();
        $question = Question::all();


        return view('user.home',compact('category','question'));
    }

    public function showQuestion($id)
    {
        $faq = Question::findOrFail($id);
        return view('user.faq_show', compact('faq'));
    }

    public function category_direct($id){
        $category_by_home = Category::with('question')->findOrFail($id);
        return view('user.categorization', compact('category_by_home'));
    }
}
