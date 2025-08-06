@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h2 class="mb-4">Statistik Admin</h2>
    <div class="mb-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card p-3 mb-4">
                    <h5 class="mb-3">Laporan Berdasarkan Status</h5>
                    <canvas id="reportStatusBar" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 mb-4">
                    <h5 class="mb-3">Laporan per Kategori</h5>
                    <canvas id="categoryBar" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 mb-4">
                    <h5 class="mb-3">Jumlah Warga</h5>
                    <canvas id="residentBar" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Laporan</h5>
                    <h2>{{ $totalReports }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Kategori Laporan</h5>
                    <h2>{{ $totalCategories }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Warga</h5>
                    <h2>{{ $totalResidents }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Chart laporan per status
        const reportStatusCtx = document.getElementById('reportStatusBar').getContext('2d');
        new Chart(reportStatusCtx, {
            type: 'bar',
            data: {
                labels: ['Terkirim', 'Diproses', 'Selesai', 'Ditolak'],
                datasets: [{
                    label: 'Jumlah Laporan',
                    data: [
                        {{ $deliveredReports }},
                        {{ $inProcessReports }},
                        {{ $completedReports }},
                        {{ $rejectedReports }}
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)', // Terkirim
                        'rgba(255, 206, 86, 0.7)', // Diproses
                        'rgba(75, 192, 192, 0.7)', // Selesai
                        'rgba(255, 99, 132, 0.7)' // Ditolak
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 2,
                    borderRadius: 8,
                    maxBarThickness: 60
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Chart laporan per kategori
        const categoryBarCtx = document.getElementById('categoryBar').getContext('2d');
        new Chart(categoryBarCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($categoryLabels) !!},
                datasets: [{
                    label: 'Jumlah Laporan',
                    data: {!! json_encode($categoryCounts) !!},
                    backgroundColor: 'rgba(153, 102, 255, 0.7)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 2,
                    borderRadius: 8,
                    maxBarThickness: 60
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Chart jumlah warga
        const residentBarCtx = document.getElementById('residentBar').getContext('2d');
        new Chart(residentBarCtx, {
            type: 'bar',
            data: {
                labels: ['Warga'],
                datasets: [{
                    label: 'Jumlah Warga',
                    data: [{{ $totalResidents }}],
                    backgroundColor: 'rgba(255, 159, 64, 0.7)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 2,
                    borderRadius: 8,
                    maxBarThickness: 60
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
@endsection
