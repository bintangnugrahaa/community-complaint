@extends('layouts.admin')

@section('title', 'Edit Data Laporan')

@section('content')
    <a href="{{ route('admin.report.index') }}" class="btn btn-danger mb-3">Kembali</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Laporan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.report.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="code">Kode Laporan</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                        name="code" value="{{ old('code', $report->code) }}" readonly>
                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="resident_id">Nama Pelapor</label>
                    <select class="form-control @error('resident_id') is-invalid @enderror" name="resident_id"
                        id="resident_id">
                        @foreach ($residents as $resident)
                            <option value="{{ $resident->id }}"
                                {{ old('resident_id', $report->resident_id) == $resident->id ? 'selected' : '' }}>
                                {{ $resident->user->email }} - {{ $resident->user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('resident_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="report_category_id">Kategori Laporan</label>
                    <select class="form-control @error('report_category_id') is-invalid @enderror" name="report_category_id"
                        id="report_category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('report_category_id', $report->report_category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('report_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title', $report->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        rows="4">{{ old('description', $report->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Foto</label>
                    @if ($report->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $report->image) }}" alt="Foto Laporan" width="100">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                        name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude"
                        name="latitude" value="{{ old('latitude', $report->latitude) }}">
                    @error('latitude')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude"
                        name="longitude" value="{{ old('longitude', $report->longitude) }}">
                    @error('longitude')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="3">{{ old('address', $report->address) }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
