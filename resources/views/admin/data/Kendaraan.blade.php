@extends('admin.layout.main')

@section('title', 'Data Kendaraan')

@section('content')
<div id="wrapper">
    @include('admin.layout.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.layout.topbar')

            <div class="container-fluid py-4 px-5">
                {{-- Alert Errors --}}
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
                        <h1 class="h4 mb-0">Tabel Data Kendaraan</h1>
                        <a href="{{ route('admin.data.addData.kendaraan') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus-circle me-1"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-3">
                            <table class="table table-hover align-items-center mb-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Plat Nomor</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Merk</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BBM</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supir</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EXP STNK</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EXP KIR</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl Pembuatan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kendaraan as $item)
                                        <tr class="text-nowrap">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->plat_nomor }}</td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>{{ $item->merk }}</td>
                                            <td>{{ $item->bbm }}</td>
                                            <td>{{ $item->petugas->nama_petugas ?? '-' }}</td>
                                            <td data-order="{{ \Carbon\Carbon::parse($item->exp_stnk)->format('Y-m-d') }}">
                                                {{ \Carbon\Carbon::parse($item->exp_stnk)->format('d M Y') }}
                                            </td>
                                            <td data-order="{{ \Carbon\Carbon::parse($item->exp_kir)->format('Y-m-d') }}">
                                                {{ \Carbon\Carbon::parse($item->exp_kir)->format('d M Y') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($item->tgl_pembuatan)->format('d M Y') }}</td>
                                            <td class="text-nowrap">
                                                <button type="button" class="btn btn-outline-primary btn-sm me-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal"
                                                    data-id="{{ $item->id }}"
                                                    data-plat="{{ $item->plat_nomor }}"
                                                    data-jenis="{{ $item->jenis }}"
                                                    data-merk="{{ $item->merk }}"
                                                    data-bbm="{{ $item->bbm }}"
                                                    data-supir="{{ $item->supir }}"
                                                    data-expstnk="{{ \Carbon\Carbon::parse($item->exp_stnk)->format('Y-m-d') }}"
                                                    data-expkir="{{ \Carbon\Carbon::parse($item->exp_kir)->format('Y-m-d') }}"
                                                    data-tgl_pembuatan="{{ \Carbon\Carbon::parse($item->tgl_pembuatan)->format('Y-m-d') }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('admin.kendaraan.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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

            <!-- Modal Edit Kendaraan -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Kendaraan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="edit-id">
                            <div class="mb-3">
                                <label for="edit-plat" class="form-label">Plat Nomor</label>
                                <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror" name="plat_nomor" id="edit-plat" value="{{ old('plat_nomor') }}" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-jenis" class="form-label">Jenis</label>
                                <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="edit-jenis" value="{{ old('jenis') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-merk" class="form-label">Merk</label>
                                <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" id="edit-merk" value="{{ old('merk') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-bbm" class="form-label">bbm</label>
                                <input type="text" class="form-control @error('bbm') is-invalid @enderror" name="bbm" id="edit-bbm" value="{{ old('bbm') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-supir" class="form-label">Supir</label>
                                <select class="form-select" name="supir" id="edit-supir" required>
                                    <option value="">-- Pilih Supir --</option>
                                    @foreach($petugas as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_petugas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit-expstnk" class="form-label">EXP STNK</label>
                                <input type="date" class="form-control @error('exp_stnk') is-invalid @enderror" name="exp_stnk" id="edit-expstnk" value="{{ old('exp_stnk') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-expkir" class="form-label">EXP KIR</label>
                                <input type="date" class="form-control @error('exp_kir') is-invalid @enderror" name="exp_kir" id="edit-expkir" value="{{ old('exp_kir') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-tgl_pembuatan" class="form-label">Tgl Pembuatan</label>
                                <input type="date" class="form-control @error('tgl_pembuatan') is-invalid @enderror" name="tgl_pembuatan" id="edit-tgl_pembuatan" value="{{ old('tgl_pembuatan') }}" required>
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
            var plat = button.getAttribute('data-plat');
            var jenis = button.getAttribute('data-jenis');
            var merk = button.getAttribute('data-merk');
            var bbm = button.getAttribute('data-bbm');
            var supir = button.getAttribute('data-supir');
            var expstnk = button.getAttribute('data-expstnk');
            var expkir = button.getAttribute('data-expkir');
            var tgl_pembuatan = button.getAttribute('data-tgl_pembuatan');

            document.getElementById('edit-id').value = id;
            document.getElementById('edit-plat').value = plat;
            document.getElementById('edit-jenis').value = jenis;
            document.getElementById('edit-merk').value = merk;
            document.getElementById('edit-bbm').value = bbm;
            document.getElementById('edit-supir').value = supir;
            document.getElementById('edit-expstnk').value = expstnk;
            document.getElementById('edit-expkir').value = expkir;
            document.getElementById('edit-tgl_pembuatan').value = tgl_pembuatan;

            // Set action form
            document.getElementById('editForm').action = 'kendaraan/' + id;
        });
    });
</script>
@endpush