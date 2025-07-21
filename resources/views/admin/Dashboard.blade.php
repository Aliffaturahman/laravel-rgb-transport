@extends('admin.layout.main')

@section('title', 'Dashboard - RGB Transport Log')

@section('content')
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('admin.layout.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('admin.layout.topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid px-5">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h2 mb-0 text-gray-800">Dashboard</h1>
                    <div class="d-none d-sm-inline-block">
                        <span class="badge bg-dark text-white p-2">
                            <i class="fas fa-calendar-alt me-1"></i>
                            {{ \Carbon\Carbon::now()->format('d F Y') }}
                            <span id="live-clock" class="ms-2"></span>
                        </span>
                    </div>
                </div>

                <!-- Company Header -->
                <div class="company-header mb-5 text-center">
                    <div class="p-4 rounded-lg shadow-sm">
                        <h2 class="text-primary fw-bold mb-1">PT. RGB Transport</h2>
                        <p class="text-muted mb-0">Solusi Logistik Terpercaya Sejak 2006</p>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row">
                    <!-- Penerimaan Barang -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100 py-2 bg-gradient-warning">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Jumlah Pemesanan</div>
                                        <div class="h2 mb-0 font-weight-bold text-white">{{ $totalPemesanan }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-truck-loading fa-3x text-white-50"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Petugas -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100 py-2 bg-gradient-info">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total Petugas</div>
                                        <div class="h2 mb-0 font-weight-bold text-white">{{ $totalPetugas }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-3x text-white-50"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Pelanggan -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100 py-2 bg-gradient-primary">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total Pelanggan</div>
                                        <div class="h2 mb-0 font-weight-bold text-white">{{ $totalPelanggan }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-tie fa-3x text-white-50"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Kendaraan -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100 py-2 bg-gradient-success">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total Kendaraan</div>
                                        <div class="h2 mb-0 font-weight-bold text-white">{{ $totalKendaraan }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-truck fa-3x text-white-50"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Row -->
                <div class="row mt-4">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-white py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Status Pengiriman</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="deliveryStatusChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-dark">Statistik Pemesanan Bulanan</h6>
                                <a href="{{ route('admin.pemesanan.index') }}" class="btn btn-sm btn-outline-dark">
                                    Lihat Semua<i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="chart-bar pt-3 pb-2 position-relative">
                                    <canvas id="monthlyActivityChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Activity Section -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                                <h6 class="m-0 font-weight-bold text-dark">Riwayat Aktivitas Setup Data Terkini</h6>
                                <a href="{{ route('admin.data.riwayat') }}" class="btn btn-sm btn-outline-dark">
                                    Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="text-nowrap">#</th>
                                                <th class="text-nowrap">Jenis</th>
                                                <th>Keterangan</th>
                                                <th class="text-nowrap">Status</th>
                                                <th class="text-nowrap">Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($riwayat as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <span class="badge bg-light text-dark">
                                                        <i class="fas {{ match($item->jenis) {
                                                            'Kendaraan' => 'fa-truck',
                                                            'Petugas' => 'fa-user',
                                                            'Pelanggan' => 'fa-user-tie',
                                                            'Harga Angkut' => 'fa-tags',
                                                            default => 'fa-file'
                                                        } }} me-1"></i>
                                                        {{ ucfirst($item->jenis) }}
                                                    </span>
                                                </td>
                                                <td class="text-truncate" style="max-width: 350px;" title="{{ $item->keterangan }}">
                                                    {{ $item->keterangan }}
                                                </td>
                                                <td>
                                                    @php
                                                        $badgeClass = match($item->status) {
                                                            'Ditambah' => 'success',
                                                            'Dihapus' => 'danger',
                                                            'Diperbarui' => 'primary',
                                                            'Ditolak' => 'secondary',
                                                            default => 'info'
                                                        };
                                                        $icon = match($item->status) {
                                                            'Ditambah' => 'fa-plus',
                                                            'Dihapus' => 'fa-trash',
                                                            'Diperbarui' => 'fa-sync',
                                                            'Ditolak' => 'fa-times',
                                                            default => 'fa-info-circle'
                                                        };
                                                    @endphp
                                                    <span class="badge bg-{{ $badgeClass }}">
                                                        <i class="fas {{ $icon }} me-1"></i>
                                                        {{ $item->status }}
                                                    </span>
                                                </td>
                                                <td class="text-nowrap">
                                                    <i class="far fa-clock me-1 text-muted"></i>
                                                    {{ \Carbon\Carbon::parse($item->waktu)->format('d F Y H:i') }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer bg-light py-2">
                                <small class="text-muted">
                                    Menampilkan {{ $riwayat->count() }} aktivitas terbaru
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('admin.layout.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
@endsection

@push('styles')
<style>
    /* Dashboard Custom Styles */
:root {
    --bprimary: #112D4E;
    --rprimary: #E84855;
    --rsecondary: #5B2333;
    --light: #EEF9FF;
    --dark: #091E3E;
    --success: #1cc88a;
    --info: #36b9cc;
    --warning: #f6c23e;
    --danger: #e74a3b;
}

/* Main Content Background */
#content-wrapper {
    background-color: #f8fafc;
}

/* Page Heading */
.d-sm-flex.align-items-center.justify-content-between.mb-4 {
    border-bottom: 1px solid rgba(9, 30, 62, 0.1);
    padding-bottom: 1rem;
}

/* Company Header */
.company-header div{
    /* border-left: 5px solid var(--bprimary) !important; */
    background: linear-gradient(90deg, var(--bprimary) 0%, white 1%) !important;
}

.company-header h2 {
    color: var(--dark) !important;
    font-size: 1.8rem;
    letter-spacing: 0.5px;
}

/* Stats Cards */
.card.bg-gradient-primary {
    background: linear-gradient(0deg, var(--primary) 0%, var(--bprimary) 10%) !important;
}

.card.bg-gradient-success {
    background: linear-gradient(0deg, var(--success) 0%, var(--bprimary) 10%) !important;
}

.card.bg-gradient-info {
    background: linear-gradient(0deg, var(--info) 0%, var(--bprimary) 10%) !important;
}

.card.bg-gradient-warning {
    background: linear-gradient(0deg, var(--warning) 0%, var(--bprimary) 10%) !important;
}

.card.bg-gradient-danger {
    background: linear-gradient(0deg, var(--danger) 0%, var(--bprimary) 10%) !important;
}


/* Card Styling */
.card {
    border-radius: 0.5rem !important;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none !important;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(9, 30, 62, 0.15) !important;
}

.card-header {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    background-color: white !important;
    border-radius: 0.5rem 0.5rem 0 0 !important;
}

/* Chart Containers */
.chart-pie, .chart-bar {
    position: relative;
    height: 300px;
}

/* Badges */
.badge {
    font-weight: 500;
    letter-spacing: 0.5px;
}

.badge.bg-dark {
    background-color: var(--dark) !important;
}

/* Buttons */
.btn-outline-dark {
    border-color: var(--bprimary);
    color: var(--bprimary);
}

.btn-outline-dark:hover {
    background-color: var(--bprimary);
    color: white;
}

/* Date Badge */
.badge.bg-dark.text-white {
    background-color: var(--bprimary) !important;
    border-radius: 15px;
    padding: 0.5rem 1rem !important;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .container-fluid.px-5 {
        padding-left: 1.5rem !important;
        padding-right: 1.5rem !important;
    }
    
    .company-header h2 {
        font-size: 1.5rem;
    }
}

/* Animation for Stats Cards */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.col-xl-3.col-md-6.mb-4 {
    animation: fadeInUp 0.6s ease forwards;
}

.col-xl-3.col-md-6.mb-4:nth-child(1) { animation-delay: 0.1s; }
.col-xl-3.col-md-6.mb-4:nth-child(2) { animation-delay: 0.2s; }
.col-xl-3.col-md-6.mb-4:nth-child(3) { animation-delay: 0.3s; }
.col-xl-3.col-md-6.mb-4:nth-child(4) { animation-delay: 0.4s; }

/* Card Footer */
.card-footer.bg-light {
    background-color: rgba(9, 30, 62, 0.03) !important;
    border-top: 1px solid rgba(0, 0, 0, 0.03);
}
</style>
@endpush

@push('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    function updateClock() {
        const now = new Date();
        const jam = now.getHours().toString().padStart(2, '0');
        const menit = now.getMinutes().toString().padStart(2, '0');
        const detik = now.getSeconds().toString().padStart(2, '0');
        document.getElementById('live-clock').textContent = jam + ':' + menit + ':' + detik;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>

<script>
// Delivery Status Chart
var ctx = document.getElementById('deliveryStatusChart').getContext('2d');
var deliveryStatusChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [
            'Menunggu Konfirmasi', 
            'Diproses', 
            'Dikirim', 
            'Selesai', 
            'Dibatalkan'
        ],
        datasets: [{
            data: [
                {{ $deliveryStats['Menunggu_Konfirmasi'] }},
                {{ $deliveryStats['Diproses'] }},
                {{ $deliveryStats['Dikirim'] }},
                {{ $deliveryStats['Selesai'] }},
                {{ $deliveryStats['Dibatalkan'] }}
            ],
            backgroundColor: [
                '#f6c23e',  // Menunggu - yellow
                '#36b9cc',  // Diproses - cyan
                '#4e73df',  // Dikirim - blue
                '#1cc88a',  // Selesai - green
                '#e74a3b'   // Dibatalkan - red
            ],
            hoverBackgroundColor: [
                '#dda20a',  // Menunggu
                '#2c9faf',  // Diproses
                '#2e59d9',  // Dikirim
                '#17a673',  // Selesai
                '#be2617'   // Dibatalkan
            ],
            hoverBorderColor: "rgba(250, 250, 250, 0.1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'left',
                labels: {
                    boxWidth: 12,
                    padding: 20,
                }
            }
        },
        cutout: '40%',
    },
});

// Monthly Activity Chart
var ctx2 = document.getElementById('monthlyActivityChart').getContext('2d');
var monthlyActivityChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: @json($monthlyLabels),
        datasets: [{
            label: "Jumlah Pemesanan",
            backgroundColor: '#E84855',
            hoverBackgroundColor: '#5B2333',
            borderWidth: 1,
            borderRadius: 4,
            data: @json($monthlyChartData),
        }],
    },
    options: {
        maintainAspectRatio: false,
        responsive: true,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.parsed.y + ' pesanan';
                    }
                }
            }
        },
        scales: {
            x: {
                grid: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxRotation: 45,
                    minRotation: 45
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: "rgba(234, 236, 244, 1)",
                    drawBorder: false
                },
                ticks: {
                    precision: 0,
                    callback: function(value) {
                        if (value % 1 === 0) {
                            return value;
                        }
                    }
                }
            }
        }
    }
});
</script>
@endpush