@extends('admin.layout.main')

@section('title', 'Daftar Pemesanan - Admin RGB Transport')

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
             
            <div class="container-fluid py-4 px-5">
                <!-- Page Heading -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h1 class='h4 text-size-bolder'>Tracking Pemesanan</h1>
                                @php
                                    $currentStatus = request()->has('status') ? request('status') : 'menunggu_konfirmasi';

                                    $statuses = [
                                        'menunggu_konfirmasi' => ['label' => 'Menunggu Konfirmasi', 'bg' => 'secondary'],
                                        'diproses' => ['label' => 'Diproses', 'bg' => 'primary'],
                                        'dikirim' => ['label' => 'Dikirim', 'bg' => 'info'],
                                        'selesai' => ['label' => 'Selesai', 'bg' => 'success'],
                                        'dibatalkan' => ['label' => 'Dibatalkan', 'bg' => 'danger'],
                                        'semua' => ['label' => 'Semua', 'bg' => 'dark'],
                                    ];
                                @endphp
                                <ul class="nav mb-0 flex-wrap">
                                    @foreach ($statuses as $key => $status)
                                        @php
                                            $isActive = ($currentStatus === $key);
                                            $bgClass = $isActive ? 'bg-' . $status['bg'] : 'bg-light';
                                            $textClass = $isActive ? 'text-white' : 'text-dark';
                                        @endphp
                                        <li class="nav-item mb-0 me-2">
                                            <a class="nav-link {{ $bgClass }} {{ $textClass }}"
                                            style="border-radius: 4px;"
                                            href="{{ $key === 'semua' ? route('admin.tracking.index', ['status' => 'semua']) : request()->fullUrlWithQuery(['status' => $key]) }}">
                                                {{ $status['label'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-3" style="overflow-x: auto;">
                                    <table id="dataTable" class="table table-hover nowrap align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Pemesanan</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemesan</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengirim</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerima</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tracking</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($pemesanan as $item)
                                            <tr>
                                                <td class="align-middle">
                                                    <p class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->nomor_pemesanan }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-sm font-weight-bold mb-0">{{ $item->user->name ?? '-' }}</p>
                                                    <p class="text-xs text-secondary mb-0">{{ $item->user->email ?? '' }}</p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-sm font-weight-bold mb-0">{{ $item->nama_pengirim }}</p>
                                                    <p class="text-xs text-secondary mb-0">{{ $item->alamat_pengirim }}</p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-sm font-weight-bold mb-0">{{ $item->nama_penerima }}</p>
                                                    <p class="text-xs text-secondary mb-0">{{ $item->alamat_penerima }}</p>
                                                </td>
                                                <td class="align-middle text-sm">
                                                    @php
                                                        $statusClass = [
                                                            'Menunggu_Konfirmasi' => 'bg-secondary',
                                                            'Diproses' => 'bg-primary',
                                                            'Dikirim' => 'bg-info',
                                                            'Selesai' => 'bg-success',
                                                            'Dibatalkan' => 'bg-danger'
                                                        ][$item->status] ?? 'bg-secondary';
                                                    @endphp
                                                    <span class="badge badge-sm {{ $statusClass }} text-capitalize">
                                                        {{ str_replace('_', ' ', $item->status) }}
                                                    </span>
                                                </td>
                                                <td class="align-middle" data-order="{{ $item->created_at->format('Y-m-d') }}">
                                                    <span class="text-secondary text-sm font-weight-bold">
                                                        {{ $item->created_at->format('d M Y') }}
                                                    </span>
                                                </td>
                                                <td class="align-middle">
                                                    <!-- Lihat Tracking -->
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-info mb-0 me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalTracking{{ $item->id }}">
                                                        <i class="fas fa-map-marked-alt"></i>
                                                    </button>

                                                    <!-- Tambah Tracking -->
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-success mb-0 me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalTambahTracking{{ $item->id }}">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </td>
                                                
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-4">Tidak ada data pemesanan</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal Tracking -->
@foreach ($pemesanan as $item)
<div class="modal fade" id="modalTracking{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #112D4E;">
                <h5 class="modal-title">Riwayat Tracking - {{ $item->nomor_pemesanan }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="timeline">
                    @forelse ($item->tracking as $track)
                    <div class="timeline-item active">
                        <div class="timeline-point"></div>
                        <div class="timeline-content">
                            <div class="timeline-header">
                                <div>
                                    <h6 class="mb-1 fw-bold" style="color: #112D4E;">{{ $track->subject }}</h6>
                                    <small class="text-muted">{{ $track->created_at->format('d M Y, H:i') }} WIB</small>
                                </div>
                                <form action="{{ route('admin.tracking.destroy', $track->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="pemesanan_id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data tracking ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="timeline-body mt-2">
                                <p class="mb-0">{{ $track->keterangan }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4 text-muted">
                        <i class="fas fa-truck fa-2x mb-3"></i>
                        <p>Belum ada data tracking.</p>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Tracking -->
<div class="modal fade" id="modalTambahTracking{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.tracking.store') }}">
            @csrf
            <input type="hidden" name="pemesanan_id" value="{{ $item->id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Tracking - {{ $item->nomor_pemesanan }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subjek</label>
                        <select class="form-select" name="subject" required>
                            <option value="" disabled selected>Pilih subjek</option>
                            <option value="Pengambilan Barang">Pengambilan Barang</option>
                            <option value="Barang Dikemas">Barang Dikemas</option>
                            <option value="Barang Selesai Dikemas & Siap Berangkat">Barang Selesai Dikemas & Siap Berangkat</option>
                            <option value="Truck Dalam Perjalanan">Truck Dalam Perjalanan</option>
                            <option value="Truck Sampai">Truck Sampai</option>
                            <option value="Pengiriman Barang Selesai">Pengiriman Barang Selesai</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection

<style>
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

    .btn-danger {
        padding: 0.25rem 0.5rem;
    }
</style>

@push('scripts')
<script>
    // Inisialisasi tooltip
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
