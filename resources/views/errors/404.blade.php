@extends('layouts.admin')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center min-vh-100 text-center"
        style="background: #f8f9fc;">
        <div class="error mx-auto" data-text="404">404</div>
        <h2 class="mb-3 font-weight-normal text-gray-700" style="font-size: 2rem;">Page Not Found</h2>
        <p class="mb-4 text-gray-500" style="font-size: 1.1rem;">It looks like you found a glitch in the matrix...</p>
        <a href="{{ url('admin/dashboard') }}" class="text-primary" style="font-size: 1.1rem; text-decoration: none;">
            &larr; Back to Dashboard
        </a>
    </div>
@endsection
