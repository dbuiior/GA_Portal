@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR -->
        <div class="col-md-3 col-lg-2 bg-light border-end min-vh-100 p-3">
            <h4 class="fw-bold mb-4">{{ config('app.name') }}</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active fw-bold text-primary' : 'text-dark' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('tickets.status') }}" class="nav-link {{ request()->routeIs('tickets.status') ? 'active fw-bold text-primary' : 'text-dark' }}">
                        <i class="bi bi-ticket-detailed me-2"></i> Tickets
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('customer.service') }}" class="nav-link text-dark">
                        <i class="bi bi-headset me-2"></i> Customer Service
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger w-100">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- KONTEN UTAMA -->
        <div class="col-md-9 col-lg-10 p-5">
            <h1 class="mb-4">Welcome to {{ config('app.name') }}</h1>
            <p class="text-muted mb-5">This is a simple Laravel application.</p>

            <!-- CARD BESAR -->
            <div class="card shadow-lg p-4 mb-5">
                <div class="card-body">
                    <h4 class="card-title mb-4 text-center fw-bold">Ticket Overview</h4>
                    
                    <!-- 3 CARD DI DALAM CARD BESAR -->
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <div class="card border-primary shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Open</h5>
                                    <h3 class="fw-bold">{{ $newCount }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card border-warning shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-warning">In Progress</h5>
                                    <h3 class="fw-bold">{{ $inProgressCount }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card border-success shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-success">Closed</h5>
                                    <h3 class="fw-bold">{{ $closedCount }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
