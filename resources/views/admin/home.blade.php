@extends('layouts.app')
@section('title', 'Admin Home')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 bg-light border-end min-vh-100 p-3">
            <h4 class="fw-bold mb-4">{{ config('app.name') }}</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.home') }}" 
                       class="nav-link {{ request()->routeIs('home') ? 'active fw-bold text-primary' : 'text-dark' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.view_tickets') }}" 
                       class="nav-link {{ request()->routeIs('tickets.status') ? 'active fw-bold text-primary' : 'text-dark' }}">
                        <i class="bi bi-ticket-detailed me-2"></i> Tickets
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-dark">
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

        <div class="col-md-9 col-lg-10 p-4">
            <h2 class="mb-4 fw-bold">All User Tickets</h2>

            <div class="row">
                @forelse($tickets as $ticket)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm h-100 border-0">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-primary">#{{ $ticket->queue_number }}</h5>
                                <p class="mb-1"><strong>User:</strong> {{ $ticket->user->name ?? 'Unknown User' }}</p>
                                <p class="mb-1"><strong>Main Issue:</strong> {{ $ticket->issue }}</p>
                                <p class="mb-1"><strong>Sub Issue:</strong> {{ $ticket->sub_issue }}</p>
                                <p class="mb-1"><strong>Status:</strong> 
                                    <span class="badge 
                                        {{ $ticket->status == 'Open' ? 'bg-success' : 
                                           ($ticket->status == 'Pending' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                        {{ $ticket->status }}
                                    </span>
                                </p>
                                <p class="text-muted small mt-2">Created at: {{ $ticket->created_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            No tickets found.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
