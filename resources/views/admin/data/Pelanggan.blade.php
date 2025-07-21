@extends('admin.layout.main')

@section('title', 'Data Pelanggan')

@section('content')
<div id="wrapper">
    @include('admin.layout.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.layout.topbar')

            <div class="container-fluid py-4 px-5">

                {{-- Alert Validation --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Flash Message --}}
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

                <!-- Card Table -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h1 class="h4 mb-0">Tabel Data Pelanggan</h1>
                        <a href="{{ route('admin.data.addData.pelanggan') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus-circle me-1"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-3">
                            <table class="table table-hover align-items-center mb-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kontak</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat 1</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat 2</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kota</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telepon</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fax</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggan as $item)
                                        <tr class="text-nowrap">
                                            <td>{{ $item->kode_pelanggan }}</td>
                                            <td>{{ $item->nama_pelanggan }}</td>
                                            <td>{{ $item->kontak }}</td>
                                            <td>{{ $item->alamat1 }}</td>
                                            <td>{{ $item->alamat2 }}</td>
                                            <td>{{ $item->kota }}</td>
                                            <td>{{ $item->telepon }}</td>
                                            <td>{{ $item->fax }}</td>
                                            <td>{{ $item->email }}</td>
                                            <!-- <td>{{ $item->hargaAngkut->kode_barang ?? '-' }}</td> -->
                                            <td class="text">
                                                <button type="button" class="btn btn-outline-primary btn-sm me-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal"
                                                    data-id="{{ $item->id }}"
                                                    data-kode="{{ $item->kode_pelanggan }}"
                                                    data-nama="{{ $item->nama_pelanggan }}"
                                                    data-kontak="{{ $item->kontak }}"
                                                    data-alamat1="{{ $item->alamat1 }}"
                                                    data-alamat2="{{ $item->alamat2 }}"
                                                    data-kota="{{ $item->kota }}"
                                                    data-telepon="{{ $item->telepon }}"
                                                    data-fax="{{ $item->fax }}"
                                                    data-email="{{ $item->email }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('admin.pelanggan.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
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

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Pelanggan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="edit-id">
                            <div class="mb-3">
                                <label for="edit-kode" class="form-label">Kode Pelanggan</label>
                                <input type="text" class="form-control" name="kode_pelanggan" id="edit-kode" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-nama" class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama_pelanggan" id="edit-nama" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-kontak" class="form-label">Contact</label>
                                <input type="text" class="form-control" name="kontak" id="edit-kontak">
                            </div>
                            <div class="mb-3">
                                <label for="edit-alamat1" class="form-label">Alamat 1</label>
                                <input type="text" class="form-control" name="alamat1" id="edit-alamat1" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-alamat2" class="form-label">Alamat 2</label>
                                <input type="text" class="form-control" name="alamat2" id="edit-alamat2">
                            </div>
                            <div class="mb-3">
                                <label for="edit-kota" class="form-label">Kota</label>
                                <input type="text" class="form-control" name="kota" id="edit-kota" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-telepon" class="form-label">Telepon</label>
                                <input type="text" class="form-control" name="telepon" id="edit-telepon" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-fax" class="form-label">Fax</label>
                                <input type="text" class="form-control" name="fax" id="edit-fax">
                            </div>
                            <div class="mb-3">
                                <label for="edit-email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="edit-email">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var kode = button.getAttribute('data-kode');
        var nama = button.getAttribute('data-nama');
        var kontak = button.getAttribute('data-kontak');
        var alamat1 = button.getAttribute('data-alamat1');
        var alamat2 = button.getAttribute('data-alamat2');
        var kota = button.getAttribute('data-kota');
        var telepon = button.getAttribute('data-telepon');
        var fax = button.getAttribute('data-fax');
        var email = button.getAttribute('data-email');

        document.getElementById('edit-id').value = id;
        document.getElementById('edit-kode').value = kode;
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-kontak').value = kontak;
        document.getElementById('edit-alamat1').value = alamat1;
        document.getElementById('edit-alamat2').value = alamat2;
        document.getElementById('edit-kota').value = kota;
        document.getElementById('edit-telepon').value = telepon;
        document.getElementById('edit-fax').value = fax;
        document.getElementById('edit-email').value = email;

        document.getElementById('editForm').action = 'pelanggan/' + id;
    });
});
</script>
@endpush