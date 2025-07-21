@extends('admin.layout.main')

@section('title', 'Data Pesan Masuk')

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

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h1 class='h4'>Daftar Pesan Masuk</h1>
                                <div class="d-flex">
                                    <div class="dropdown me-2">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-filter me-1"></i> Filter Status
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['subject' => '']) }}">Semua</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['subject' => 'pertanyaan']) }}">Pertanyaan</a></li>
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['subject' => 'kritik']) }}">Kritik</a></li>
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['subject' => 'saran']) }}">Saran</a></li>
                                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['subject' => 'lainnya']) }}">Lainnya</a></li>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-3" style="overflow-x: auto;">
                                    <table id="dataTable" class="table table-hover align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kontak</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subjek</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pesan</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($messages as $msg)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">{{ $msg->name }}</td>
                                                <td class="align-middle">
                                                    {{ $msg->email }}
                                                    <div class="text-muted medium mt-1">
                                                        {{ $msg->phone ?? '-' }} 
                                                    </div>   
                                                </td>
                                                <td class="align-middle">
                                                    @if($msg->subject)
                                                        @php
                                                            $badgeConfig = [
                                                                'Pertanyaan' => ['color' => 'bg-primary', 'icon' => 'fa-question-circle'],
                                                                'Kritik' => ['color' => 'bg-danger', 'icon' => 'fa-exclamation-circle'],
                                                                'Saran' => ['color' => 'bg-warning', 'icon' => 'fa-lightbulb'],
                                                                'Lainnya' => ['color' => 'bg-info', 'icon' => 'fa-ellipsis-h']
                                                            ][$msg->subject] ?? ['color' => 'bg-primary', 'icon' => 'fa-envelope'];
                                                        @endphp
                                                        
                                                        <span class="badge {{ $badgeConfig['color'] }}">
                                                            <i class="fas {{ $badgeConfig['icon'] }} me-1"></i>
                                                            {{ $msg->subject }}
                                                        </span>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="align-middle">
                                                    {{ Str::limit($msg->message, 100) }}
                                                </td>
                                                <td class="align-middle" data-order="{{ $msg->created_at->format('Y-m-d') }}">
                                                    {{ $msg->created_at->format('d M Y H:i') }}
                                                </td>
                                                <td class="align-middle text-nowrap">
                                                    <form action="{{ route('admin.pesan.delete', $msg->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-original-title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-4">Tidak ada pesan masuk</td>
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

@push('scripts')
<script>

</script>
@endpush
