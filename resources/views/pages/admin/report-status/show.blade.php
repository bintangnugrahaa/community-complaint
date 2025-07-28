@extends('layouts.admin')

@section('title', 'Show Data Kategori')

@section('content')
    <!-- Page Heading -->
    <a href="{{ route('admin.report-category.index') }}" class="btn btn-danger mb-3">Kembali</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Icon</td>
                    <td>
                        <img src="{{ asset('storage/' . $category->image) }}" alt="image" width="100">
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $category->name }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
