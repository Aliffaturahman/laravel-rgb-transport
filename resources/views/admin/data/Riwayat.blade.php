@extends('admin.layout.main')

@section('title', 'Riwayat')

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
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h1 class='h4'>Riwayat Aktivitas Setup Data</h1>
                                <div class="d-flex">
                                    <div class="dropdown me-2">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-filter me-1"></i> Filter Status
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['status' => '']) }}">Semua</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['status' => 'ditambah']) }}">Ditambah</a></li>
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['status' => 'diperbarui']) }}">Diperbarui</a></li>
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['status' => 'dihapus']) }}">Dihapus</a></li>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-3" style="overflow-x: auto;">
                                    <table id="dataTable" class="table table-hover table nowrap align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($riwayat as $item)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
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
                                                <td class="align-middle">{{ $item->keterangan }}</td>
                                                <td class="align-middle">
                                                    @php
                                                        $statusConfig = match($item->status) {
                                                            'Ditambah' => [
                                                                'color' => 'bg-success',
                                                                'icon' => 'fa-plus-circle'
                                                            ],
                                                            'Dihapus' => [
                                                                'color' => 'bg-danger',
                                                                'icon' => 'fa-trash-alt'
                                                            ],
                                                            'Diperbarui' => [
                                                                'color' => 'bg-primary',
                                                                'icon' => 'fa-sync-alt'
                                                            ]
                                                        };
                                                    @endphp
                                                    <span class="badge badge-sm {{ $statusConfig['color'] }}">
                                                        <i class="fas {{ $statusConfig['icon'] }} me-1"></i>
                                                        {{ $item->status }}
                                                    </span>
                                                </td>
                                                <td class="text-nowrap" data-order="{{ \Carbon\Carbon::parse($item->waktu)->format('Y-m-d') }}">
                                                    <i class="far fa-clock me-1 text-muted"></i>
                                                    {{ \Carbon\Carbon::parse($item->waktu)->format('d F Y H:i') }}
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-4">Tidak ada riwayat aktivitas</td>
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
@endsection

@push('styles')
<style>
    
</style>
@endpush
