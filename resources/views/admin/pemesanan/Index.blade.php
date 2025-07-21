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
                                <h1 class='h4 text-size-bolder'>Daftar Pemesanan</h1>
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
                                            href="{{ $key === 'semua' ? route('admin.pemesanan.index', ['status' => 'semua']) : request()->fullUrlWithQuery(['status' => $key]) }}">
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
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Biaya</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kendaraan</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
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
                                                <td class="align-middle">
                                                    <span class="text-secondary text-xs font-weight-bold">Rp {{ number_format($item->biaya, 0, ',', '.') }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $item->kendaraan?->plat_nomor ?? '-' }}
                                                    </p>
                                                    <p class="text-xs text-secondary mb-0">
                                                        {{ $item->kendaraan?->petugas?->nama_petugas ?? '-' }}
                                                    </p>
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
                                                    <!-- Detail -->
                                                    <a href="{{ route('admin.pemesanan.detail', $item->id) }}" class="btn btn-sm btn-outline-primary mb-0 me-2" data-toggle="tooltip" data-original-title="Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <!-- Edit Pemesanan -->
                                                    <button 
                                                        class="btn btn-sm btn-outline-warning me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal"
                                                        data-id="{{ $item->id }}"
                                                        data-nomor="{{ $item->nomor_pemesanan }}"
                                                        data-biaya="{{ $item->biaya }}"
                                                        data-status="{{ $item->status }}"
                                                        data-kendaraan-id="{{ $item->kendaraan_id }}">

                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <!-- Hapus -->
                                                    <form action="{{ route('admin.pemesanan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pemesanan ini?');" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger mb-0 me-2" data-toggle="tooltip" data-original-title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
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

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="editForm">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Status Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nomor Pemesanan</label>
                        <input type="text" class="form-control" id="editNomor" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Biaya (Rp)</label>
                        <input type="number" name="biaya" id="editBiaya" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Pemesanan</label>
                        <select name="status" id="editStatus" class="form-select" required>
                            @foreach(['Menunggu_Konfirmasi', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'] as $status)
                                <option value="{{ $status }}">{{ ucwords(str_replace('_', ' ', $status)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kendaraan</label>
                        <select name="kendaraan_id" id="editKendaraan" class="form-select">
                            <option value="">-- Pilih Kendaraan --</option>
                            @foreach($kendaraan as $kendaraan)
                                <option value="{{ $kendaraan->id }}">
                                    {{ $kendaraan->plat_nomor }} - {{ $kendaraan->petugas->nama_petugas ?? 'Tanpa Supir' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Inisialisasi tooltip
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nomor = button.getAttribute('data-nomor');
            var biaya = button.getAttribute('data-biaya');
            var status = button.getAttribute('data-status');
            var kendaraanId = button.getAttribute('data-kendaraan-id');

            document.getElementById('editNomor').value = nomor;
            document.getElementById('editBiaya').value = biaya;
            document.getElementById('editStatus').value = status;
            document.getElementById('editKendaraan').value = kendaraanId;

            document.getElementById('editForm').action = "/admin/pemesanan/" + id;
        });
    });
</script>
@endpush
