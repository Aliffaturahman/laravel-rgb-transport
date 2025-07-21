@extends('customer.layout.main')

@section('title', 'Lacak Pengiriman - RGB Transport')

@section('content')
<section class="hero-section-mini text-white py-5">
  <div id="particles-js" class="position-absolute top-0 start-0 w-100 h-50"></div>
    <div class="container text-center mt-5">
        <div class="row align-items-center pt-5 mt-5">
        <h1 class="display-4 fw-bold">Status Pengiriman</h1>
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-2" style="z-index: 1">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('customer.index') }}" class="text-white text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item active text-white" aria-current="page">Status</li>
            </ol>
        </nav>
        </div>
    </div>
    </div>
</section>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="container-fluid py-5 px-3">
    <div class="row justify-content-center">
        <!-- Tabel Riwayat Pemesanan -->
        <div class="col-lg-10 mb-5">
            <div class="card shadow-sm border-0">
                <div class="card-header text-white py-3" style="background-color: #112D4E">
                    <h3 class="mb-0"><i class="fas fa-history me-2"></i>Riwayat Pemesanan</h3>
                </div>
                <div class="card-body p-4">
                    @if($riwayat_pemesanan->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0 w-100 py-3" id="riwayatTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor Pemesanan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengirim</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerima</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayat_pemesanan as $index => $p)
                                <tr>
                                    <td class="align-middle">{{ $index + 1 }}</td>
                                    <td class="align-middle" style="min-width: 250px">
                                        <div class="d-flex align-items-center">
                                            <span class="me-3">{{ $p->nomor_pemesanan }}</span>
                                            <button class="btn btn-sm p-1 copy-btn" 
                                                    data-clipboard-text="{{ $p->nomor_pemesanan }}"
                                                    title="Copy to clipboard">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </div>
                                    </td>

                                    <td class="align-middle" style="min-width: 200px;">
                                        <p class="fw-bold mb-0">{{ $p->nama_pengirim }}</p>
                                        <p class="text-muted small mb-0">{{ $p->alamat_pengirim }}</p>
                                    </td>

                                    <td class="align-middle" style="min-width: 200px;">
                                        <p class="fw-bold mb-0">{{ $p->nama_penerima }}</p>
                                        <p class="text-muted small mb-0">{{ $p->alamat_penerima }}</p>
                                    </td>

                                    <td class="align-middle">
                                        @php
                                            $status = strtolower($p->status);
                                            $badgeColor = match($status) {
                                                'diproses' => 'warning',
                                                'dikirim' => 'info',
                                                'selesai' => 'success',
                                                'dibatalkan' => 'danger',
                                                default => 'secondary'
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $badgeColor }}">
                                            <i class="fas fa-truck me-1"></i>{{ ucfirst($p->status) }}
                                        </span>
                                    </td>
                                    <td class="align-middle" data-order="{{ $p->created_at->format('Y-m-d') }}">
                                        {{ $p->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4 text-muted">
                        <i class="fas fa-folder-open fa-2x mb-2"></i><br>
                        <span>Belum ada riwayat pemesanan.</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-8 mt-2">
            <div class="card shadow-sm border-0">
                <div class="card-header text-white py-3" style="background-color: #112D4E">
                    <h3 class="mb-0"><i class="fas fa-map-marked-alt me-2"></i>Lacak Status Pengiriman</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('customer.tracking.search') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="nomor_pemesanan" class="form-control" placeholder="Masukkan Nomor Pemesanan" required>
                            <button class="btn btn-primary btn-lg">
                                <i class="fas fa-search me-2"></i>Lacak
                            </button>
                        </div>
                    </form>
                    
                    @if(isset($pemesanan))
                    <div class="tracking-result">
                        <div class="card mb-4">
                            <div class="card-body">
                                <!-- Header Row -->
                                <div class="row mb-3 pb-2 border-bottom">
                                    <div class="col-md-6">
                                        <h5 class="mb-0 fw-bold">{{ $pemesanan->nomor_pemesanan }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="ms-0">{{ $pemesanan->created_at->format('d F Y') }}</span>
                                        </div>
                                        <div class="col-md-3 text-md-end">
                                            @php
                                                $status = strtolower($pemesanan->status);
                                                $badgeColor = match($status) {
                                                    'diproses' => 'warning',
                                                    'dikirim' => 'info',
                                                    'selesai' => 'success',
                                                    'dibatalkan' => 'danger',
                                                    default => 'secondary'
                                                };
                                            @endphp
                                            <span class="badge bg-{{ $badgeColor }}">
                                                <i class="fas fa-truck me-1"></i>{{ ucfirst($pemesanan->status) }}
                                            </span>
                                    </div>
                                </div>

                                <!-- Sender and Receiver Cards -->
                                <div class="row g-3 mb-3 mt-3">
                                    <!-- Pengirim -->
                                    <div class="col-md-6">
                                        <div class="card h-100 border-start border-2" style="border-left: 5px solid #112D4E !important;">
                                            <div class="card-body">
                                                <h6 class="card-title mb-4 fw-bold" style="color: #112D4E;">
                                                    <i class="fas fa-user-tie me-2"></i>Pengirim
                                                </h6>
                                                <div class="row mb-2">
                                                    <div class="col-md-4 text-muted">Nama</div>
                                                    <div class="col-md-8 fw-bold">{{ $pemesanan->nama_pengirim }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-4 text-muted">Nama Tempat</div>
                                                    <div class="col-md-8">{{ $pemesanan->nama_tempat_pengirim }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 text-muted">Alamat</div>
                                                    <div class="col-md-8">
                                                        <i class="fas fa-map-marker-alt me-1" style="color: #112D4E;"></i>
                                                        <span class="text-muted small">{{ $pemesanan->alamat_pengirim }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-4 text-muted">Kota/Provinsi</div>
                                                    <div class="col-md-8">
                                                        <i class="fas fa-city me-1" style="color: #112D4E;"></i>
                                                        <span class="text-muted small">{{ $pemesanan->kota_pengirim }}, {{ $pemesanan->provinsi_pengirim }} {{ $pemesanan->kode_pos_pengirim }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Penerima -->
                                    <div class="col-md-6">
                                        <div class="card h-100 border-start border-2" style="border-left: 5px solid #E84855 !important;">
                                            <div class="card-body">
                                                <h6 class="card-title mb-4 fw-bold" style="color: #E84855;">
                                                    <i class="fas fa-user me-2"></i>Penerima
                                                </h6>
                                                <div class="row mb-2">
                                                    <div class="col-md-4 text-muted">Nama</div>
                                                    <div class="col-md-8 fw-bold">{{ $pemesanan->nama_penerima }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-4 text-muted">Nama Tempat</div>
                                                    <div class="col-md-8">{{ $pemesanan->nama_tempat_penerima }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 text-muted">Alamat</div>
                                                    <div class="col-md-8">
                                                        <i class="fas fa-map-marker-alt me-1" style="color: #E84855;"></i>
                                                        <span class="text-muted small">{{ $pemesanan->alamat_penerima }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-4 text-muted">Kota/Provinsi</div>
                                                    <div class="col-md-8">
                                                        <i class="fas fa-city me-1" style="color: #E84855;"></i>
                                                        <span class="text-muted small">{{ $pemesanan->kota_penerima }}, {{ $pemesanan->provinsi_penerima }} {{ $pemesanan->kode_pos_penerima }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Vehicle Card -->
                                @if($pemesanan->kendaraan)
                                    <div class="row mt-5 mb-3">
                                        <div class="col-md-12">
                                            <h5 class="mb-3" style="color: #112D4E;">
                                                <i class="fas fa-truck me-2"></i>Informasi Kendaraan
                                            </h5>
                                            <div class="card border-start border-2" style="border-left: 5px solid #112D4E !important;">
                                                <div class="card-body">
                                                    <div class="row mb-2">
                                                        <div class="col-md-3 text-muted">Supir</div>
                                                        <div class="col-md-9 fw-bold">{{ $pemesanan->kendaraan->petugas->nama_petugas }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-3 text-muted">Plat Nomor</div>
                                                        <div class="col-md-9">{{ $pemesanan->kendaraan->plat_nomor }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-3 text-muted">Jenis Kendaraan</div>
                                                        <div class="col-md-9">{{ $pemesanan->kendaraan->jenis }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <h5 class="mb-4" style="color: #112D4E;">
                            <i class="fas fa-timeline me-3"></i>Status Saat Ini
                        </h5>
                        <div class="timeline">
                            @forelse ($tracking_pengiriman as $log)
                            <div class="timeline-item active">
                                <div class="timeline-point"></div>
                                <div class="timeline-content">
                                    <div class="timeline-header">
                                        <div>
                                            <h6 class="mb-1 fw-bold" style="color: #112D4E;">{{ $log->subject }}</h6>
                                        </div>
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($log->waktu)->format('d M Y, H:i') }} WIB</small>
                                    </div>
                                    <div class="timeline-body mt-2 bg-light">
                                        <p class="mb-0">{{ $log->keterangan }}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-4 text-muted">
                                <i class="fas fa-truck fa-2x mb-3"></i>
                                <p>Belum ada riwayat pengiriman.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    @endif  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .dataTables_wrapper .dataTables_paginate .page-link {
        color: #112D4E !important; 
        /* border: 1px solid #112D4E !important; */
        /* background-color: transparent !important; */
    }

    .dataTables_wrapper .dataTables_paginate .page-link:hover {
        /* background-color: #112D4E !important; */
        /* color: white !important; */
    }

    .dataTables_wrapper .dataTables_paginate .page-item.active .page-link {
        background-color: #112D4E !important;
        border-color: #112D4E !important;
        color: white !important;
    }
</style>

<style>
    .breadcrumb-item + .breadcrumb-item::before {
        color: white;
        font-size: 1rem;
    }
    
    .btn-primary {
        background-color: var(--bprimary);
        border-color: var(--bprimary);
    }
    
    .btn-primary:hover {
        background-color: #000000;
        border-color: #000000;
    }

    .hero-section-mini {
        height: 350px;
        background: linear-gradient(135deg, var(--bprimary) 0%,rgb(0, 0, 0) 100%);
        border-radius: 0 0 15px 15px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.9);
        margin-bottom: 20px;
        /* background: rgba(0, 0, 0, 0.6) url('/img/truck.jpg') center/cover no-repeat; 
        background-blend-mode: darken; */
    }

    #particles-js {
        z-index: 0;
        opacity: 0.5;
    }

    .copy-btn {
        width: 24px;
        height: 24px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        transition: all 0.2s;
        border: 1px solid var(--bprimary);
    }

    .copy-btn:hover {
        color: white;
        background-color: var(--bprimary);
    }

    .copy-btn i {
        font-size: 0.8rem;
    }
    
    .timeline {
        position: relative;
        padding-left: 30px;
    }
    
    .timeline-item {
        position: relative;
        padding-bottom: 25px;
    }
    
    .timeline-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
    }
    
    .timeline-body {
        background: white;
        padding: 10px;
        border-radius: 4px;
        border-left: 3px solid #112D4E;
    }

    .timeline-point {
        position: absolute;
        left: -30.5px;
        top: 0;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #dee2e6;
        border: 4px solid white;
    }

    .timeline-item.active .timeline-point {
        top: 10px;
        background-color: #112D4E;
    }

    .timeline-item.active .timeline-point {
        background-color: #112D4E;
    }

    .timeline-content {
        padding: 10px 15px;
        border-radius: 5px;
    }

    .timeline-item.active .timeline-content {
        box-shadow: 2px 2px 4px rgba(0,0,0,1);
    }

    .timeline-item:not(:last-child)::after {
        content: '';
        position: absolute;
        left: -22px;
        top: 30px;
        height: calc(100% - 20px);
        width: 2px;
        background-color: #dee2e6;
    }

    .timeline-item.active:not(:last-child)::after {
        background-color: #112D4E;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize clipboard.js
        var clipboard = new ClipboardJS('.copy-btn');
        
        // Show tooltip on success
        clipboard.on('success', function(e) {
            var originalTitle = e.trigger.getAttribute('title');
            e.trigger.setAttribute('title', 'Copied!');
            e.trigger.classList.add('text-success');
            
            var tooltip = new bootstrap.Tooltip(e.trigger, {
                trigger: 'manual'
            });
            tooltip.show();
            
            setTimeout(function() {
                tooltip.hide();
                e.trigger.setAttribute('title', originalTitle);
                e.trigger.classList.remove('text-success');
            }, 2000);
            
            e.clearSelection();
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#riwayatTable').DataTable({
            pageLength: 5,
            "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"] ],


            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                paginate: {
                    previous: "Kembali",
                    next: "Lanjut"
                },
                zeroRecords: "Data tidak ditemukan",
            },
            columnDefs: [
                { orderable: false, targets: [1, 4] } 
            ]
        });
    });
</script>

<script>
particlesJS("particles-js", {
    "particles": {
        "number": {
            "value": 100,
            "density": { "enable": true, "value_area": 800 }
        },
        "color": { "value": "#E84855" },  // warna partikel (rprimary)
        "shape": {
            "type": "circle",
            "stroke": { "width": 0, "color": "#000000" }
        },
        "opacity": {
            "value": 0.6,
            "random": true,
            "anim": { "enable": true, "speed": 0.5, "opacity_min": 0.1 }
        },
        "size": {
            "value": 4,
            "random": true,
            "anim": { "enable": true, "speed": 2, "size_min": 0.3 }
        },
        "move": {
            "enable": true,
            "speed": 1,
            "direction": "none",
            "random": true,
            "out_mode": "out"
        }
    },
    "interactivity": {
        "events": {
            "onhover": { "enable": true, "mode": "repulse" },
            "onclick": { "enable": true, "mode": "push" }
        },
        "modes": {
            "repulse": { "distance": 100 },
            "push": { "particles_nb": 4 }
        }
    },
    "retina_detect": true
});
</script>
@endpush