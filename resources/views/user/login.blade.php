@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <h1>Login to {{ config('app.name') }}</h1>
    <form method="POST" action="/login">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    @if (session('failed'))
        <div class="alert alert-danger mt-3">
           {{ session('failed') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
@endsection