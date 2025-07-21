@extends('admin.layout.main')

@section('title', 'Data Harga Angkut')

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

                <!-- Alerts -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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
                        <h1 class="h4 mb-0">Tabel Data Harga Angkut</h1>
                        <a href="{{ route('admin.data.addData.hargaAngkut') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus-circle me-1"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 ">
                        <div class="table-responsive p-3">
                            <table class="table table-hover align-items-center mb-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Kode Barang</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Kode Pemesanan</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Jenis Barang</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Satuan</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Berat</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Dimensi</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Catatan</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Harga</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">By Kawal</th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hargaAngkut as $item)
                                        <tr>
                                            <td>{{ $item->kode_barang }}</td>
                                            <td>{{ $item->pemesanan->nomor_pemesanan ?? '-' }}</td>
                                            <td>{{ $item->jenis_barang }}</td>
                                            <td>{{ $item->satuan }}</td>
                                            <td>{{ $item->berat }} kg</td>
                                            <td>{{ $item->dimensi }}</td>
                                            <td>{{ $item->catatan }}</td>
                                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($item->by_kawal, 0, ',', '.') }}</td>
                                            <td class="text-nowrap">
                                                <button type="button" class="btn btn-outline-primary btn-sm me-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal"
                                                    data-id="{{ $item->id }}"
                                                    data-kode="{{ $item->kode_barang }}"
                                                    data-nama="{{ $item->jenis_barang }}"
                                                    data-satuan="{{ $item->satuan }}"
                                                    data-berat="{{ $item->berat }}"
                                                    data-dimensi="{{ $item->dimensi }}"
                                                    data-catatan="{{ $item->catatan }}"
                                                    data-harga="{{ $item->harga }}"
                                                    data-by_kawal="{{ $item->by_kawal }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('admin.hargaAngkut.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                <!-- End Card -->

            </div>
        </div>

        <!-- Modal Edit Harga Angkut -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Harga Angkut</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="edit-id">
                            <div class="mb-3">
                                <label for="edit-kode" class="form-label">Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" id="edit-kode" readonly required>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="nomor_pemesanan" class="form-label">Nomor Pemesanan</label>
                                <input type="text" class="form-control @error('nomor_pemesanan') is-invalid @enderror" id="nomor_pemesanan" name="nomor_pemesanan" value="{{ old('nomor_pemesanan') }}" required>
                            </div> -->
                            <div class="mb-3">
                                <label for="edit-nama" class="form-label">Jenis Barang</label>
                                <input type="text" class="form-control" name="jenis_barang" id="edit-nama" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-satuan" class="form-label">Satuan</label>
                                <input type="text" class="form-control" name="satuan" id="edit-satuan" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-berat" class="form-label">Berat (kg)</label>
                                <input type="number" class="form-control" name="berat" id="edit-berat" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-dimensi" class="form-label">Dimensi</label>
                                <input type="text" class="form-control" name="dimensi" id="edit-dimensi" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="edit-catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" name="catatan" id="edit-catatan" rows="2" readonly></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="edit-harga" class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga" id="edit-harga" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-by_kawal" class="form-label">By Kawal</label>
                                <input type="number" class="form-control" name="by_kawal" id="edit-by_kawal" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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
            var satuan = button.getAttribute('data-satuan');
            var berat = button.getAttribute('data-berat');
            var dimensi = button.getAttribute('data-dimensi');
            var catatan = button.getAttribute('data-catatan');
            var harga = button.getAttribute('data-harga');
            var byKawal = button.getAttribute('data-by_kawal');

            document.getElementById('edit-id').value = id;
            document.getElementById('edit-kode').value = kode;
            document.getElementById('edit-nama').value = nama;
            document.getElementById('edit-satuan').value = satuan;
            document.getElementById('edit-berat').value = berat;
            document.getElementById('edit-dimensi').value = dimensi;
            document.getElementById('edit-catatan').value = catatan;
            document.getElementById('edit-harga').value = harga;
            document.getElementById('edit-by_kawal').value = byKawal;

            // Set action form
            document.getElementById('editForm').action = "hargaAngkut/" + id;
        });
    });
</script>
@endpush