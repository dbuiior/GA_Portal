@extends('layouts.app')

@section('title', $category_by_home->name)

@section('content')
<div class="container mt-5">
    <h2 class="fw-bold text-center mb-4">{{ $category_by_home->name }}</h2>

    @if($category_by_home->question->isEmpty())
        <div class="alert alert-info text-center">
            Belum ada pertanyaan untuk kategori ini.
        </div>
    @else
        <div class="list-group">
            @foreach ($category_by_home->question as $question)
                <a href="{{ route('faq.show', $question->id) }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1 text-primary">{{ $question->question }}</h5>
                    <p class="mb-1 text-muted">{{ Str::limit($question->solution, 100) }}</p>
                    <small class="text-secondary">Klik untuk lihat selengkapnya →</small>
                </a>
            @endforeach
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-outline-primary">← Kembali ke Home</a>
    </div>
</div>
@endsection
