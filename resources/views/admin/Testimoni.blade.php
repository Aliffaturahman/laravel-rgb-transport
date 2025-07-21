@extends('admin.layout.main')

@section('title', 'Data Testimoni')

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
                                <h1 class='h4'>Daftar Testimoni</h1>
                                <div class="d-flex">
                                    <div class="dropdown me-2">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-filter me-1"></i> Filter Status
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['is_active' => '']) }}">Semua</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['is_active' => '0']) }}">Nonaktif</a></li>
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['is_active' => '1']) }}">Aktif</a></li>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-3" style="overflow-x: auto;">
                                    <table id="dataTable" class="table table-hover table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kontak</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Komentar</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($testimonials as $item)
                                            <tr>
                                                <td class="align-middle text-sm">{{ $loop->iteration }}</td>
                                                <td class="align-middle text-sm">{{ $item->name }}</td>
                                                <td class="align-middle text-sm">
                                                    {{ $item->email ?? '-' }}
                                                    <div class="text-muted small mt-1">
                                                        {{ $item->telepon ?? '-' }}
                                                    </div>
                                                </td>
                                                <td class="align-middle text-sm">{{ $item->rating }}/5</td>
                                                <td class="align-middle text-sm">
                                                    @if ($item->photo)
                                                        <img src="{{ asset($item->photo) }}" alt="Foto" width="50" height="50" class="rounded-circle">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="align-middle text-sm">
                                                    {{ Str::limit($item->comment, 100) }}
                                                    <div class="text-muted small mt-1" data-order="{{ $item->created_at->format('Y-m-d') }}">
                                                        {{ $item->created_at->format('d M Y H:i') }}
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <span class="badge {{ $item->is_active ? 'bg-primary' : 'bg-secondary' }}">
                                                        {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-nowrap">
                                                    <form action="{{ route('admin.testimoni.toggle', $item->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm {{ $item->is_active ? 'btn-outline-secondary' : 'btn-outline-primary' }}" title="{{ $item->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                            <i class="fas {{ $item->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.testimoni.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="9" class="text-center py-4">Tidak ada data testimoni</td>
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