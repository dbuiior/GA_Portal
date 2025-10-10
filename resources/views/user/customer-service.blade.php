@extends('layouts.app')
@section('title', 'Customer Service')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        {{-- Sidebar --}}
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
                    <a href="{{ route('customer.service') }}" class="nav-link {{ request()->routeIs('customer.service') ? 'active fw-bold text-primary' : 'text-dark'}}">
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

        {{-- Main Content (Form) --}}
        <div class="col-md-9 col-lg-10 p-4">
            <h2 class="mb-4">Customer Service Form</h2>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('question.submit') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text"
                        id="name"
                        name="name"
                        value="{{ Auth::user()->name }}"
                        class="form-control"
                        readonly>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                        id="email"
                        name="email"
                        value="{{ Auth::user()->email }}"
                        class="form-control"
                        readonly>
                </div>

                <div class="mb-3">
                    <label for="main_issue" class="form-label">Masalah Utama</label>
                    <select class="form-control" id="main_issue" name="main_issue" required>
                        <option value="">-- Pilih Masalah --</option>
                        <option value="aftersales">Aftersales Service</option>
                        <option value="unit">Masalah Unit / Produk</option>
                        <option value="parts">Ketersediaan Spare Parts</option>
                        <option value="sales">Permintaan Penawaran (RFQ) / Sales</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="sub_issue" class="form-label">Sub Masalah</label>
                    <select class="form-control" id="sub_issue" name="sub_issue" required>
                        <option value="">-- Pilih Sub Masalah --</option>
                        <option value="ticket">Tidak bisa membuat tiket</option>
                        <option value="followup">Tidak ada follow up</option>
                        <option value="tracking">Tracking unit tidak muncul</option>
                        <option value="parts_missing">Spare part tidak tersedia</option>
                        <option value="rfq_delay">RFQ lama diproses</option>
                        <option value="general_service">Permintaan general service</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Kirim</button>
            </form>
        </div>
    </div>
</div>
@endsection
