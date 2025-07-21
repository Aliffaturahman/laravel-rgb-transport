@extends('customer.layout.main')

@section('title', 'Pemesanan Berhasil - RGB Transport')

@section('content')
<section class="hero-section-mini text-white py-5">
    <div id="particles-js" class="position-absolute top-0 start-0 w-100 h-50"></div>
        <div class="container text-center mt-5">
            <div class="row align-items-center pt-5 mt-5">
            <h1 class="display-4 fw-bold">Pemesanan Berhasil</h1>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-2" style="z-index: 1">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('customer.index') }}" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('customer.pemesanan') }}" class="text-white text-decoration-none">Pemesanan</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Berhasil</li>
                </ol>
            </nav>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <div class="icon-primary mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#112D4E" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                        <h2 class="mb-3" style="color: #112D4E;">Pemesanan Anda Berhasil!</h2>
                        <p class="lead">Terima kasih telah menggunakan layanan kami. Berikut detail pemesanan Anda:</p>
                    </div>
                    
                    <div class="card mb-4" style="border: 1px solid #112D4E;">
                        <div class="card-header text-white" style="background-color: #112D4E;">
                            <h5 class="my-1"><i class="fas fa-receipt me-2"></i>Informasi Pemesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Nomor Pemesanan:</strong></p>
                                    <h4 style="color: #E84855;">{{ $pemesanan->nomor_pemesanan }}</h4>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Status:</strong></p>
                                    <span class="badge bg-secondary text-white text-capitalize">
                                        {{ str_replace('_', ' ', $pemesanan->status) }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Tanggal Pemesanan:</strong></p>
                                    <p>{{ $pemesanan->created_at->format('d F Y H:i') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Total Biaya:</strong></p>
                                    <h4 style="color: #E84855;">Rp {{ number_format($pemesanan->biaya, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 ">
                                <div class="card-header text-white" style="background-color: #112D4E;">
                                    <h5 class="my-1"><i class="fas fa-user-tie me-2"></i>Pengirim</h5>
                                </div>
                                <div class="card-body text-start">
                                    <div class="row mb-2 ">
                                        <div class="col-md-4 text-muted">Nama</div>
                                        <div class="col-md-8 fw-bold">{{ $pemesanan->nama_pengirim }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4 text-muted">Telepon</div>
                                        <div class="col-md-8">{{ $pemesanan->telepon_pengirim }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4 text-muted">Nama Tempat</div>
                                        <div class="col-md-8">{{ $pemesanan->nama_tempat_pengirim }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-muted">Alamat</div>
                                        <div class="col-md-8">
                                            <span class="text-muted small">{{ $pemesanan->alamat_pengirim }}</span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4 text-muted">Kota/Provinsi</div>
                                        <div class="col-md-8">
                                            <span class="text-muted small">{{ $pemesanan->kota_pengirim }}, {{ $pemesanan->provinsi_pengirim }} {{ $pemesanan->kode_pos_pengirim }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 ">
                                <div class="card-header text-white" style="background-color: #112D4E;">
                                    <h5 class="my-1"><i class="fas fa-user me-2"></i>Penerima</h5>
                                </div>
                                <div class="card-body text-start">
                                    <div class="row mb-2 ">
                                        <div class="col-md-4 text-muted">Nama</div>
                                        <div class="col-md-8 fw-bold">{{ $pemesanan->nama_penerima }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4 text-muted">Telepon</div>
                                        <div class="col-md-8">{{ $pemesanan->telepon_penerima }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4 text-muted">Nama Tempat</div>
                                        <div class="col-md-8">{{ $pemesanan->nama_tempat_penerima }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-muted">Alamat</div>
                                        <div class="col-md-8">
                                            <span class="text-muted">{{ $pemesanan->alamat_penerima }}</span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4 text-muted">Kota/Provinsi</div>
                                        <div class="col-md-8">
                                            <span class="text-muted small">{{ $pemesanan->kota_penerima }}, {{ $pemesanan->provinsi_penerima }} {{ $pemesanan->kode_pos_penerima }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header text-white" style="background-color: #112D4E;">
                            <h5 class="my-1"><i class="fas fa-box-open me-2"></i>Detail Barang Pengiriman</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr class="table">
                                            <th width="5%">No</th>
                                            <th width="25%">Jenis Barang</th>
                                            <th width="15%">Berat (kg)</th>
                                            <th width="20%">Dimensi</th>
                                            <th width="40%">Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pemesanan->barang as $index => $barang)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $barang->jenis_barang }}</td>
                                            <td>{{ number_format($barang->berat, 2) }}</td>
                                            <td>{{ $barang->dimensi ?? '-' }}</td>
                                            <td>{{ $barang->catatan ?? '-' }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4">Tidak ada data barang</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    @if($pemesanan->barang->isNotEmpty())
                                    <tfoot>
                                        <tr class="table-light">
                                            <th colspan="2">Total</th>
                                            <th>{{ number_format($pemesanan->barang->sum('berat'), 2) }} kg</th>
                                            <th colspan="2"></th>
                                        </tr>
                                    </tfoot>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-3 d-md-flex justify-content-md-center mt-5 mb-4">
                        <a href="{{ route('customer.index') }}" class="btn btn-lg btn-back-to-home px-4 me-md-2">
                            <i class="fas fa-home me-2"></i>Kembali ke Beranda
                        </a>
                        <a href="{{ route('customer.tracking') }}?resi={{ $pemesanan->nomor_pemesanan }}" class="btn btn-lg btn-lacak px-4">
                            <i class="fas fa-search me-2"></i>Lacak Pengiriman
                        </a>
                    </div>
                    
                    <div class="alert alert-info mt-5 mb-0">
                        <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Informasi Penting</h5>
                        <p class="mb-0">
                            Kami akan segera memproses pesanan Anda. Silakan cek whatsapp atau email Anda untuk mendapatkan konfirmasi lebih lanjut. 
                            Anda juga dapat melacak status pengiriman menggunakan nomor pemesanan di atas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .hero-section-mini {
        height: 350px;
        background: linear-gradient(135deg, var(--bprimary) 0%,rgb(0, 0, 0) 100%);
        border-radius: 0 0 15px 15px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.9);
        margin-bottom: 20px;
    }
    
    .icon-success {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: rgba(40, 167, 69, 0.1);
    }
    
    .card-header {
        color: white;
    }
    
    .breadcrumb-item + .breadcrumb-item::before {
        color: white;
        font-size: 1rem;
    }

    .btn-back-to-home {
        color: var(--rprimary);
        border: 1px solid var(--rprimary);
    }

    .btn-back-to-home:hover {
        color: white;
        background-color: var(--rprimary);
        border-color: var(--rprimary);
    }

    .btn-lacak{
        color: white;
        background-color: var(--bprimary);
        border: 1px solid var(--bprimary);
    }

    .btn-lacak:hover{
        color: white;
        background-color: var(--bprimary);
        border: 1px solid var(--bprimary);
    }
</style>
@endpush

@push('scripts')
<script>
particlesJS("particles-js", {
    "particles": {
        "number": {
            "value": 100,
            "density": { "enable": true, "value_area": 800 }
        },
        "color": { "value": "#E84855" },  // warna partikel (rprimary)
        "shape": {
            "type": "circle",
            "stroke": { "width": 0, "color": "#000000" }
        },
        "opacity": {
            "value": 0.6,
            "random": true,
            "anim": { "enable": true, "speed": 0.5, "opacity_min": 0.1 }
        },
        "size": {
            "value": 4,
            "random": true,
            "anim": { "enable": true, "speed": 2, "size_min": 0.3 }
        },
        "move": {
            "enable": true,
            "speed": 1,
            "direction": "none",
            "random": true,
            "out_mode": "out"
        }
    },
    "interactivity": {
        "events": {
            "onhover": { "enable": true, "mode": "repulse" },
            "onclick": { "enable": true, "mode": "push" }
        },
        "modes": {
            "repulse": { "distance": 100 },
            "push": { "particles_nb": 4 }
        }
    },
    "retina_detect": true
});
</script>
@endpush