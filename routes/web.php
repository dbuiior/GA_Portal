<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ======================
// 🔐 AUTHENTICATION
// ======================

// Halaman login
Route::get('/', function () {
    return view('user.login');
})->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/')->with('success', 'Logout berhasil!');
})->name('logout');

// ======================
// 👤 USER ROUTES
// ======================
Route::middleware(['role:customer'])->group(function () {

    // Dashboard User
    Route::get('/home', [DashboardController::class, 'categories'])->name('home');

    Route::get('/faq/{id}', [DashboardController::class, 'showQuestion'])->name('faq.show');

    Route::get('/category/{id}', [DashboardController::class, 'category_direct'])->name('category.show');


    // Customer Service Page
    Route::get('/customer-service', function () {
        return view('user.customer-service');
    })->name('customer.service');

    // Submit Question
    Route::post('/customer-service/submit', [ResponseController::class, 'store'])
        ->name('question.submit');

    // View All Tickets
    Route::get('/tickets/status', [ResponseController::class, 'show_Ticket'])
        ->name('tickets.status');
});

// ======================
// 🧑‍💼 ADMIN ROUTES
// ======================
Route::middleware(['role:admin'])->group(function () {

    // View Tickets (Admin)
    Route::get('/admin/view-tickets', function () {
        return view('admin.view_tickets');
    })->name('admin.view_tickets');

    Route::get('/admin/home', [AdminController::class, 'show_all_ticket'])->name('admin.home');
});
