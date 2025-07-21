@extends('admin.layout.main')

@section('title', 'Add Surat Tanda Terima Barang [STT]')

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
                <!-- <div class="container mt-4"> -->
                    <h4>Add Surat Tanda Terima Barang [STT]</h4>

                    <form action="{{ route('admin.transaksi.penerimaanBarang') }}" method="POST">
                        @csrf

                        {{-- Informasi STT --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="no_stt" class="form-label">No./Tgl STT</label>
                                <div class="d-flex">
                                    <input type="text" name="no_stt" id="no_stt" class="form-control me-2" placeholder="Nomor STT">
                                    <input type="date" name="tanggal_stt" id="tanggal_stt" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                        </div>

                        {{-- Data Pengirim & Penerima --}}
                        <div class="row mb-3">
                            {{-- Pengirim --}}
                            <div class="col-md-6">
                                <h6>Pengirim</h6>
                                <div class="mb-2 d-flex">
                                    <input type="text" name="pengirim" class="form-control" placeholder="Pengirim">
                                    <button class="btn btn-secondary ms-2">F1</button>
                                </div>
                                <input type="text" name="alamat_pengirim" class="form-control mb-2" placeholder="Alamat">
                                <input type="text" name="kota_pengirim" class="form-control mb-2" placeholder="Kota">
                                <input type="text" name="penghubung_pengirim" class="form-control" placeholder="Penghubung">
                            </div>

                            {{-- Penerima --}}
                            <div class="col-md-6">
                                <h6>Penerima</h6>
                                <div class="mb-2 d-flex">
                                    <input type="text" name="penerima" class="form-control" placeholder="Penerima">
                                    <button class="btn btn-secondary ms-2">F2</button>
                                </div>
                                <input type="text" name="alamat_penerima" class="form-control mb-2" placeholder="Alamat">
                                <input type="text" name="kota_penerima" class="form-control mb-2" placeholder="Kota">
                                <input type="text" name="penghubung_penerima" class="form-control" placeholder="Penghubung">
                            </div>
                        </div>

                        {{-- Daftar Barang --}}
                        <h6>Daftar Barang</h6>
                        <table class="table table-bordered mb-3">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th>Qty</th>
                                    <th>Titip</th>
                                    <th>Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Kosongkan dulu, akan diisi lewat JavaScript/dinamis --}}
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada barang ditambahkan.</td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- Data Barang Muatan --}}
                        <h6>Data Barang Muatan</h6>
                        <div class="row mb-3">
                            <div class="col-md-4 d-flex">
                                <input type="text" name="jenis_barang" class="form-control" placeholder="Jenis Barang">
                                <button class="btn btn-secondary ms-2">F3</button>
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="banyaknya" class="form-control" placeholder="Banyaknya">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="keterangan" class="form-control" placeholder="Titipan Contoh / Keterangan">
                            </div>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary">New</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                            <button type="reset" class="btn btn-warning">Cancel</button>
                            <button type="button" class="btn btn-success">Proses</button>
                        </div>
                    </form>
                </div>
                <!-- End of Container -->
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
