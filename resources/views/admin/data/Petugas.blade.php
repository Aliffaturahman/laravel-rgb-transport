@extends('admin.layout.main')

@section('title', 'Data Petugas')

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
                        <!-- Alert -->
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <!-- Card Table -->
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                <h1 class="h4 mb-0">Tabel Data Petugas</h1>
                                <a href="{{ route('admin.data.addData.petugas') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-plus-circle me-1"></i> Tambah Data
                                </a>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-3" style="overflow-x: auto;">
                                    <table id="dataTable" class="table table-hover table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Otoritas</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($petugas as $item)
                                            <tr>
                                                <td class="align-middle">{{ $item->kode_petugas }}</td>
                                                <td class="align-middle">{{ $item->nama_petugas }}</td>
                                                <td class="align-middle">{{ $item->jabatan ?? '-' }}</td>
                                                <td class="align-middle">
                                                    @if($item->otoritas)
                                                        @php
                                                            $otoritasConfig = [
                                                                'admin' => [
                                                                    'color' => 'bg-success',
                                                                    'icon' => 'fa-user-shield',
                                                                    'text' => 'Admin'
                                                                ],
                                                                'user' => [
                                                                    'color' => 'bg-info',
                                                                    'icon' => 'fa-user',
                                                                    'text' => 'User'
                                                                ]
                                                            ][strtolower($item->otoritas)] ?? [
                                                                'color' => 'bg-secondary',
                                                                'icon' => 'fa-user-circle',
                                                                'text' => $item->otoritas
                                                            ];
                                                        @endphp
                                                        
                                                        <span class="badge {{ $otoritasConfig['color'] }}">
                                                            <i class="fas {{ $otoritasConfig['icon'] }} me-1"></i>
                                                            {{ $otoritasConfig['text'] }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-nowrap">
                                                    <button type="button" class="btn btn-sm btn-outline-primary me-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal"
                                                        data-id="{{ $item->id }}"
                                                        data-kode="{{ $item->kode_petugas }}"
                                                        data-nama="{{ $item->nama_petugas }}"
                                                        data-jabatan="{{ $item->jabatan }}"
                                                        data-otoritas="{{ $item->otoritas }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <form action="{{ route('admin.petugas.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
            </div>

            <!-- Modal Edit Petugas -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Petugas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="edit-id">
                            <div class="mb-3">
                                <label for="edit-kode" class="form-label">Kode Petugas</label>
                                <input type="text" class="form-control" name="kode_petugas" id="edit-kode" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-nama" class="form-label">Nama Petugas</label>
                                <input type="text" class="form-control" name="nama_petugas" id="edit-nama" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="edit-jabatan">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-otoritas" class="form-label">Otoritas</label>
                                <select class="form-select" name="otoritas" id="edit-otoritas" required>
                                    <option value="">-- Pilih Otoritas --</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- End Modal -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('admin.layout.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var kode = button.getAttribute('data-kode');
            var nama = button.getAttribute('data-nama');
            var jabatan = button.getAttribute('data-jabatan');
            var otoritas = button.getAttribute('data-otoritas');

            document.getElementById('edit-id').value = id;
            document.getElementById('edit-kode').value = kode;
            document.getElementById('edit-nama').value = nama;
            document.getElementById('edit-jabatan').value = jabatan;
            document.getElementById('edit-otoritas').value = otoritas;

            document.getElementById('editForm').action = 'petugas/' + id;
        });
    });
</script>

@if ($errors->any() && session('open_edit_modal'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modal = new bootstrap.Modal(document.getElementById('editModal'));
        modal.show();
    });
</script>
@endif
@endpush
