@extends('admin.layout.main')

@section('title', 'Tambah Data Petugas')

@section('content')
<div id="wrapper">

    @include('admin.layout.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.layout.topbar')

            <div class="container-fluid">
                <div class="container mt-5">
                    <div class="d-sm-flex align-items-center justify-content-between mt-5 mb-5">
                        <h1 class="h2">Tambah Data Petugas</h1>
                        <a href="{{ route('admin.data.petugas') }}" class="btn btn-dark">Kembali</a>
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
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{ route('admin.data.addData.petugas') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode_petugas" class="form-label">Kode Petugas</label>
                                    <input type="text" class="form-control @error('kode_petugas') is-invalid @enderror" id="kode_petugas" name="kode_petugas" value="{{ old('kode_petugas', $newKode) }}" readonly required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_petugas" class="form-label">Nama Petugas</label>
                                    <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror" id="nama_petugas" name="nama_petugas" value="{{ old('nama_petugas') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="otoritas" class="form-label">Otoritas</label>
                                    <select class="form-select @error('otoritas') is-invalid @enderror" id="otoritas" name="otoritas" required>
                                        <option value="">-- Pilih Otoritas --</option>
                                        <option value="User" {{ old('otoritas') == 'User' ? 'selected' : '' }}>User</option>
                                        <option value="Admin" {{ old('otoritas') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
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