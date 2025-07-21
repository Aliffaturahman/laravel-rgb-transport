@extends('admin.layout.main')

@section('title', 'Tambah Data Pelanggan')

@section('content')
<div id="wrapper">

    @include('admin.layout.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.layout.topbar')

            <div class="container-fluid">
                <div class="container mt-5">
                    <div class="d-sm-flex align-items-center justify-content-between mt-5 mb-5">
                        <h1 class="h2">Tambah Data Pelanggan</h1>
                        <a href="{{ route('admin.data.pelanggan') }}" class="btn btn-dark">Kembali</a>
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

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{ route('admin.data.addData.pelanggan') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode_pelanggan" class="form-label">Kode Pelanggan</label>
                                    <input type="text" class="form-control @error('kode_pelanggan') is-invalid @enderror" id="kode_pelanggan" name="kode_pelanggan" value="{{ old('kode_pelanggan', $newKode) }}" readonly required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kontak" class="form-label">Contact</label>
                                    <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak" value="{{ old('kontak') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat1" class="form-label">Alamat 1</label>
                                    <input type="text" class="form-control @error('alamat1') is-invalid @enderror" id="alamat1" name="alamat1" value="{{ old('alamat1') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat2" class="form-label">Alamat 2</label>
                                    <input type="text" class="form-control @error('alamat2') is-invalid @enderror" id="alamat2" name="alamat2" value="{{ old('alamat2') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota</label>
                                    <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ old('kota') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="fax" class="form-label">Fax</label>
                                    <input type="text" class="form-control @error('fax') is-invalid @enderror" id="fax" name="fax" value="{{ old('fax') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
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
