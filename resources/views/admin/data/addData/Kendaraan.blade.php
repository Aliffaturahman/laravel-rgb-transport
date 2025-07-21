@extends('admin.layout.main')

@section('title', 'Tambah Data Kendaraan')

@section('content')
<div id="wrapper">

    @include('admin.layout.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            @include('admin.layout.topbar')

            <div class="container-fluid">
                <div class="container mt-5">
                    <div class="d-sm-flex align-items-center justify-content-between mt-5 mb-5">
                        <h1 class="h2">Tambah Data Kendaraan</h1>
                        <a href="{{ route('admin.data.kendaraan') }}" class="btn btn-dark">Kembali</a>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{ route('admin.data.addData.kendaraan') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="plat_nomor" class="form-label">Plat Nomor</label>
                                    <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror" id="plat_nomor" name="plat_nomor" value="{{ old('plat_nomor') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis" class="form-label">Jenis</label>
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" value="{{ old('jenis') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="merk" class="form-label">Merk</label>
                                    <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk" value="{{ old('merk') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bbm" class="form-label">BBM</label>
                                    <input type="text" class="form-control @error('bbm') is-invalid @enderror" id="bbm" name="bbm" value="{{ old('bbm') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="supir" class="form-label">Supir</label>
                                    <select class="form-select" id="supir" name="supir" required>
                                        <option value="">-- Pilih Supir --</option>
                                        @foreach($petugas as $p)
                                            <option value="{{ $p->ID_PETUGAS }}">{{ $p->nama_petugas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exp_stnk" class="form-label">EXP STNK</label>
                                    <input type="date" class="form-control @error('exp_stnk') is-invalid @enderror" id="exp_stnk" name="exp_stnk" value="{{ old('exp_stnk') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exp_kir" class="form-label">EXP KIR</label>
                                    <input type="date" class="form-control @error('exp_kir') is-invalid @enderror" id="exp_kir" name="exp_kir" value="{{ old('exp_kir') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_pembuatan" class="form-label">Tanggal Pembuatan</label>
                                    <input type="date" class="form-control @error('tgl_pembuatan') is-invalid @enderror" id="tgl_pembuatan" name="tgl_pembuatan" value="{{ old('tgl_pembuatan') }}" required>
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
        @include('admin.layout.footer')
    </div>
</div>
@endsection