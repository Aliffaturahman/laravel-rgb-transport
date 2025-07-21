@extends('admin.layout.main')

@section('title', 'Detail Pemesanan - Customer RGB Transport')

@section('content')
<div class="container-fluid py-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pemesanan</h1>
        <a href="{{ route('customer.dashboard') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary">
            <h6 class="m-0 font-weight-bold fs-5 text-white">
                <i class="fas fa-receipt mr-2"></i>Nomor Pemesanan: {{ $pemesanan->nomor_pemesanan }}
                <span class="badge float-right">
                    {{ $pemesanan->created_at->format('d M Y H:i') }}
                </span>
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4 border-left-primary">
                        <div class="card-header py-2 bg-light">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <i class="fas fa-user-tie mr-2"></i>Data Pengirim
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <th width="30%">Nama</th>
                                        <td>{{ $pemesanan->nama_pengirim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>{{ $pemesanan->telepon_pengirim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $pemesanan->alamat_pengirim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kota</th>
                                        <td>{{ $pemesanan->kota_pengirim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <td>{{ $pemesanan->provinsi_pengirim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Pos</th>
                                        <td>{{ $pemesanan->kode_pos_pengirim }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card mb-4 border-left-success">
                        <div class="card-header py-2 bg-light">
                            <h6 class="m-0 font-weight-bold text-success">
                                <i class="fas fa-user mr-2"></i>Data Penerima
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <th width="30%">Nama</th>
                                        <td>{{ $pemesanan->nama_penerima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>{{ $pemesanan->telepon_penerima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $pemesanan->alamat_penerima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kota</th>
                                        <td>{{ $pemesanan->kota_penerima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <td>{{ $pemesanan->provinsi_penerima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Pos</th>
                                        <td>{{ $pemesanan->kode_pos_penerima }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 border-left-info">
                        <div class="card-header py-2 bg-light">
                            <h6 class="m-0 font-weight-bold text-info">
                                <i class="fas fa-box-open mr-2 my-1"></i>Detail Barang
                                    @php
                                        $statusClass = [
                                            'pending' => 'warning',
                                            'diproses' => 'primary',
                                            'dikirim' => 'info',
                                            'selesai' => 'success',
                                            'dibatalkan' => 'danger'
                                        ][strtolower($pemesanan->status)] ?? 'secondary';
                                    @endphp
                                <span class="badge badge-{{ $statusClass }} float-right p-1">
                                    {{ str_replace('_', ' ', $pemesanan->status) }}
                                </span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Jenis Barang</th>
                                            <th>Berat (kg)</th>
                                            <th>Dimensi</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemesanan->barang as $barang)
                                        <tr>
                                            <td>{{ $barang->jenis_barang }}</td>
                                            <td>{{ $barang->berat }}</td>
                                            <td>{{ $barang->dimensi ?? '-' }}</td>
                                            <td>{{ $barang->catatan ?? '-' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card border-left-warning">
                        <div class="card-header py-2 bg-light">
                            <h6 class="m-0 font-weight-bold text-warning">
                                <i class="fas fa-money-bill-wave mr-2"></i>Informasi Pembayaran
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-borderless table-sm">
                                        <tr>
                                            <th width="40%">Biaya</th>
                                            <td class="font-weight-bold text-success">
                                                Rp {{ number_format($pemesanan->biaya, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card mb-4 border-left-danger">
                        <div class="card-header py-2 bg-light">
                            <h6 class="m-0 font-weight-bold text-danger">
                                <i class="fas fa-truck mr-2"></i>Informasi Kendaraan
                            </h6>
                        </div>
                        <div class="card-body">
                            @if($pemesanan->kendaraan)
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nomor Polisi</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Merk</th>
                                                <th>Supir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $pemesanan->kendaraan->plat_nomor }}</td>
                                                <td>{{ $pemesanan->kendaraan->jenis }}</td>
                                                <td>{{ $pemesanan->kendaraan->merk }}</td>
                                                <td>
                                                    @if($pemesanan->kendaraan->petugas)
                                                        {{ $pemesanan->kendaraan->petugas->nama_petugas }}
                                                    @else
                                                        <span class="text-muted">Belum ditentukan</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle mr-2"></i> Belum ada kendaraan yang ditugaskan untuk pemesanan ini.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection