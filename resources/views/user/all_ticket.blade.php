@extends('layouts.app')
@section('title', 'View All Tickets')

@section('content')

<div class="d-flex min-vh-100">
    <div class="bg-light border-end p-4" style="width: 250px;">
        <h4 class="fw-bold mb-4">{{ config('app.name') }}</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('home') }}" 
                   class="nav-link {{ request()->routeIs('home') ? 'active fw-bold text-primary' : 'text-dark' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('tickets.status') }}" 
                   class="nav-link {{ request()->routeIs('tickets.status') ? 'active fw-bold text-primary' : 'text-dark' }}">
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


<div class="flex-grow-1 p-4">
    <h1 class="mb-4 fw-bold">Your Tickets</h1>

    @if($tickets->isEmpty())
        <div class="alert alert-info">
            Belum ada tiket yang dibuat.
        </div>
    @else
        <div class="d-flex flex-wrap gap-4">
            @foreach($tickets as $ticket)
                <div class="card shadow-sm" style="width: 300px;">
                    <div class="card-header bg-primary text-white">
                        <strong>Queue: {{ $ticket->queue_number }}</strong>
                    </div>
                    <div class="card-body">
                        <p><strong>Main Issue:</strong> {{ $ticket->question }}</p>

                        <p class="text-muted mb-0">
                            <small><i class="bi bi-clock"></i> {{ $ticket->created_at->format('d M Y, H:i') }}</small>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

</div>
@endsection
