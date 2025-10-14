@extends('layouts.app')

@section('title', $faq->question)

@section('content')
<div class="container py-5">
    <div class="card shadow p-4">
        <h3 class="fw-bold text-primary mb-3">{{ $faq->question }}</h3>
        <p class="text-muted fs-5">{{ $faq->solution }}</p>

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                ← Kembali
            </a>
        </div>
    </div>
</div>
@endsection
