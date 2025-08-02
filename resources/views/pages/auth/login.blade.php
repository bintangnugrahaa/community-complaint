@extends('layouts.auth')

@section('title')
    Lapor Pak
@endsection

@section('content')
    <h5 class="fw-bold mt-5">Selamat datang di Lapor Pak 👋</h5>
    <p class="text-muted mt-2">Silahkan masuk untuk melanjutkan</p>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert"
            style="background-color: #e6f9e6; border-color: #b2e2b2;">
            <i class="fas fa-check-circle me-2" style="color: #28a745;"></i>
            <div>
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" @error('email') is-invalid @enderror id="email" name="email"
                value="{{ old('email') }}" autocomplete="email">

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" @error('password') @enderror id="password" name="password"
                value="{{ old('password') }}" autocomplete="current-password">

            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary w-100 mt-2" type="submit" color="primary" id="btn-login">
            Masuk
        </button>

        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('register') }}" class="text-decoration-none text-primary">Belum punya akun?</a>
            <a href="" class="text-decoration-none text-primary">Lupa
                Password</a>
        </div>

    </form>
@endsection
