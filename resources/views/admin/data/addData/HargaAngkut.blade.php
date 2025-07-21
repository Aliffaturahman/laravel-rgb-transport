@extends('admin.layout.main')

@section('title', 'Tambah Data Harga Angkut')

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

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="container mx-auto mt-5">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mt-5 mb-5">
                        <h1 class="h2">Tambah Data Harga Angkut</h1>
                        <a href="{{ route('admin.data.hargaAngkut') }}" class="btn btn-dark">Kembali</a>
                    </div>

                    <!-- Form Input Harga Angkut -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <strong>Tambah Harga Angkut</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.data.addData.hargaAngkut') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode_barang" class="form-label">Kode Barang</label>
                                    <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang" value="{{ old('kode_barang', $newKode) }}" readonly required>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_pemesanan" class="form-label">Nomor Pemesanan</label>
                                    <input type="text" class="form-control @error('nomor_pemesanan') is-invalid @enderror" id="nomor_pemesanan" name="nomor_pemesanan" value="{{ old('nomor_pemesanan') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_barang" class="form-label">Jenis Barang</label>
                                    <select class="form-select @error('jenis_barang') is-invalid @enderror" id="jenis_barang" name="jenis_barang" required>
                                        <option value="">Pilih Jenis Barang</option>
                                        <option value="Bangunan" {{ old('jenis_barang') == 'Bangunan' ? 'selected' : '' }}>Bangunan</option>
                                        <option value="Tekstil" {{ old('jenis_barang') == 'Tekstil' ? 'selected' : '' }}>Tekstil</option>
                                        <option value="Dokumen" {{ old('jenis_barang') == 'Dokumen' ? 'selected' : '' }}>Dokumen</option>
                                        <option value="Makanan" {{ old('jenis_barang') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                                        <option value="Elektronik" {{ old('jenis_barang') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                        <option value="Lainnya" {{ old('jenis_barang') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" value="{{ old('satuan') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="berat" class="form-label">Berat (Kg)</label>
                                    <input type="number" class="form-control @error('berat') is-invalid @enderror" id="berat" name="berat" value="{{ old('berat') }}" step="0.01" required>
                                </div>
                                <div class="mb-3">
                                    <label for="dimensi" class="form-label">Dimensi</label>
                                    <input type="text" class="form-control @error('dimensi') is-invalid @enderror" id="dimensi" name="dimensi" value="{{ old('dimensi') }}" placeholder="Contoh: 100x50x30">
                                </div>
                                <div class="mb-3">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" rows="3" placeholder="Tambahkan keterangan tambahan jika ada">{{ old('catatan') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="by_kawal" class="form-label">By Kawal</label>
                                    <input type="number" class="form-control @error('by_kawal') is-invalid @enderror" id="by_kawal" name="by_kawal" value="{{ old('by_kawal') }}" required>
                                </div>
                                <div class="mb-3 text-end">
                                    <button type="reset" class="btn btn-outline-primary me-2">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>

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