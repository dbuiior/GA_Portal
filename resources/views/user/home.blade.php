@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- KONTEN UTAMA -->
            <div class="col-md-9 col-lg-10 p-5">
                <h1 class="mb-4">Welcome to {{ config('app.name') }}</h1>
                <p class="text-muted mb-5">This is a simple Laravel application.</p>

                <!-- CARD BESAR -->
                <div class="card shadow-lg p-4 mb-5">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-center fw-bold">Pilih topik sesuai dengan masalah</h4>
                        <!-- 3 CARD DI DALAM CARD BESAR -->
                        <div class="row text-center justify-content-center">
                            @foreach ($category as $cat)
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <a href="{{ route('category.show', $cat->id ) }}" class="text-decoration-none">
                                        <div
                                            class="card shadow-sm border-2 hover-card btn d-flex align-items-center justify-content-center">
                                                <h5 class="text-primary fw-semibold mb-0">{{ $cat->name }}</h5>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- FAQ SECTION -->
                <div class="card shadow p-4">
                    <h4 class="text-center mb-4 fw-bold">FAQ (Frequently Asked Questions)</h4>
                    <div class="accordion" id="faqAccordion">
                        @foreach ($question as $index => $q)
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button collapsed fw-semibold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                        aria-controls="collapse{{ $index }}">
                                        {{ $q->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-muted">
                                        {{ Str::limit($q->solution, 100) }}
                                        <a href="{{ route('faq.show', $q->id) }}"
                                            class="text-primary text-decoration-none ms-1">
                                            Selengkapnya →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>

    <style>
        .hover-card {
            transition: transform 0.25s ease-in-out, box-shadow 0.25s ease-in-out;
            border-radius: 12px;
            min-height: 100px;
            cursor: pointer;
        }

        .hover-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .hover-card a {
            color: inherit;
            text-decoration: none;
        }

        .hover-card a:hover {
            color: #0d6efd;
        }
    </style>
@endsection