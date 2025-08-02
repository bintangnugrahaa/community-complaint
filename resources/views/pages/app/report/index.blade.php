@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('content')
    <div class="header-nav">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/app/images/icons/ArrowLeft.svg') }}" alt="arrow-left">
        </a>

        <h1>List Pengaduan @if($category) - {{ $category }} @endif</h1>
    </div>

    <div class="py-5" id="reports">
        <div class="d-flex justify-content-between align-items-center">
            <p class="text-muted">{{ $reports->count() }} List Pengaduan</p>

            <button class="btn btn-filter" type="button">
                <i class="fa-solid fa-filter me-2"></i>
                Filter
            </button>

        </div>

        <div class="d-flex flex-column gap-3 mt-3">
            @foreach ($reports as $report)
                <div class="card card-report border-0 shadow-none">
                    <a href="{{ route('report.show', $report->code) }}" class="text-decoration-none text-dark">
                        <div class="card-body p-0">
                            <div class="card-report-image position-relative mb-2">
                                <img src="{{ asset('storage/' . $report->image) }}" alt="">

                                @php
                                    $latestStatus = $report->reportStatuses->last()->status ?? 'delivered';
                                @endphp

                                @if ($latestStatus === 'delivered')
                                    <div class="badge-status delivered">
                                        Terkirim
                                    </div>
                                @elseif ($latestStatus === 'in_process')
                                    <div class="badge-status on-process">
                                        Diproses
                                    </div>
                                @elseif ($latestStatus === 'completed')
                                    <div class="badge-status done">
                                        Selesai
                                    </div>
                                @endif
                            </div>

                            <div class="d-flex justify-content-between align-items-end mb-2">
                                <div class="d-flex align-items-center ">
                                    <img src="{{ asset('assets/app/images/icons/MapPin.png') }}" alt="map pin"
                                        class="icon me-2">
                                    <p class="text-primary city">
                                        {{ $report->address }}
                                    </p>
                                </div>

                                <p class="text-secondary date">
                                    {{ $report->created_at->format('d M Y') }}
                                </p>
                            </div>

                            <h1 class="card-title">
                                {{ $report->title }}
                            </h1>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
