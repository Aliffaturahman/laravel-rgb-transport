@extends('customer.layout.main')

@section('title', 'Pesan Pengiriman - RGB Transport')

@section('content')
<section class="hero-section-mini text-white py-5">
    <div id="particles-js" class="position-absolute top-0 start-0 w-100 h-50"></div>
        <div class="container text-center mt-5">
            <div class="row align-items-center pt-5 mt-5">
            <h1 class="display-4 fw-bold">Pemesanan</h1>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-2" style="z-index: 1">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('customer.index') }}" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Pemesanan</li>
                </ol>
            </nav>
            </div>
        </div>
    </div>
</section>

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card shadow-sm border-0">
                <div class="card-header py-3">
                    <h3 class="mb-0"><i class="fas fa-truck me-2"></i>Form Pemesanan</h3>
                </div>
                <div class="card-body p-4">
                    <form id="bookingForm" action="{{ route('customer.pemesanan.submit') }}" method="POST">
                        @csrf
                        
                        <div id="confirmationMessage" class="mt-4 mb-5 alert alert-warning" style="display: none;">
                            <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Konfirmasi Pemesanan</h5>
                            <p class="mb-0">
                                Apakah data pemesanan yang anda isi sudah benar? 
                                Jika sudah benar silakan submit kembali.
                            </p>
                        </div>

                        @php
                            $profilBelumLengkap = empty($user->alamat1) || empty($user->telepon) || empty($user->kontak) || empty($user->kota);
                        @endphp

                        @if ($profilBelumLengkap)
                            <div id="confirmationMessage" class="mt-4 mb-5 alert alert-warning">
                                <h5 class="alert-heading">
                                    <i class="fas fa-info-circle me-2"></i>Lengkapi Profil Anda
                                </h5>
                                <p class="mb-0">
                                    Untuk mempercepat proses pengisian formulir, silakan lengkapi profil Anda terlebih dahulu.
                                    Data pengirim seperti <strong>nama, alamat, dan nomor HP</strong> akan terisi otomatis.
                                    <br><br>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-warning mt-2">
                                        <i class="fas fa-user-edit me-1"></i> Perbarui Profil
                                    </a>
                                </p>
                            </div>
                        @endif

                        <!-- Step 1: Data Pengirim -->
                        <div class="step step-1 active">
                            <h4 class="mb-4 border-bottom pb-2">Data Pengirim</h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" value="{{ old('nama_pengirim', $user->pengirim_nama) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="telepon_pengirim" class="form-label">Nomor Telepon / Whatsapp</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        <input type="tel" class="form-control" id="telepon_pengirim" name="telepon_pengirim" value="{{ old('telepon_pengirim', $user->pengirim_telepon) }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="nama_tempat_pengirim" class="form-label">Nama Tempat / Bangunan</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        <input class="form-control" id="nama_tempat_pengirim" name="nama_tempat_pengirim" value="{{ old('nama_tempat_pengirim', $user->pengirim_nama_tempat ?? '-') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="alamat_pengirim" class="form-label">Alamat</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <textarea class="form-control" id="alamat_pengirim" name="alamat_pengirim" rows="2" required>{{ old('pengirim_alamat', $user->pengirim_alamat ?? '-') }}</textarea>
                                    </div>
                                </div>
                                
                                <!-- Kota Pengirim -->
                                <div class="col-md-4">
                                    <label for="kota_pengirim" class="form-label">Kota</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                        <input type="text" class="form-control" id="kota_pengirim" name="kota_pengirim" value="{{ old('pengirim_kota', $user->pengirim_kota ?? '-') }}" required>
                                    </div>
                                </div>

                                <!-- Provinsi Pengirim -->
                                <div class="col-md-4">
                                    <label for="provinsi_pengirim" class="form-label">Provinsi</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                                        <input type="text" class="form-control" id="provinsi_pengirim" name="provinsi_pengirim" value="{{ old('pengirim_provinsi', $user->pengirim_provinsi ?? '-') }}" required>
                                    </div>
                                </div>

                                <!-- Kode Pos Pengirim -->
                                <div class="col-md-4">
                                    <label for="kode_pos_pengirim" class="form-label">Kode Pos</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                        <input type="text" class="form-control" id="kode_pos_pengirim" name="kode_pos_pengirim" value="{{ old('pengirim_kode_pos', $user->pengirim_kode_pos ?? '-') }}" required>
                                    </div>
                                </div>

                                <div class="col-12 text-end mt-3">
                                    <button type="button" class="btn btn-next next-step">
                                        Lanjut <i class="fas fa-arrow-circle-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Step 2: Data Penerima -->
                        <div class="step step-2 d-none">
                            <h4 class="mb-4 border-bottom pb-2">Data Penerima</h4>
                            <div class="g-3">
                                <div class="mb-3">
                                    <ul class="nav nav-tabs" id="data-toggle-group" role="tablist">
                                        <li class="nav-item me-2">
                                            <button type="button"
                                                    class="nav-link w-70"
                                                    id="btn-data-baru"
                                                    data-color="#112D4E">
                                                <i class="fas fa-plus-circle me-2"></i>Data Baru
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button"
                                                    class="nav-link w-10"
                                                    id="btn-data-lama"
                                                    data-color="#112D4E">
                                                <i class="fas fa-history me-2"></i>Data Lama
                                            </button>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Data Lama -->
                                <div id="form-data-lama" class="d-none mb-3">
                                    <label class="form-label">Pilih Data Penerima Sebelumnya</label>
                                    <div class="input-group">
                                        <select class="form-select" id="select-alamat-lama">
                                            <option value="">-- Pilih Alamat Lama --</option>
                                            @foreach ($alamatLama as $alamat)
                                                <option value="{{ $alamat->id }}"
                                                    data-nama="{{ $alamat->nama }}"
                                                    data-telepon="{{ $alamat->telepon }}"
                                                    data-nama_tempat="{{ $alamat->nama_tempat }}"
                                                    data-alamat="{{ $alamat->alamat }}"
                                                    data-kota="{{ $alamat->kota }}"
                                                    data-provinsi="{{ $alamat->provinsi }}"
                                                    data-kode_pos="{{ $alamat->kode_pos }}">
                                                    {{ $alamat->nama }} - {{ $alamat->nama_tempat }} ({{ Str::limit($alamat->alamat, 40) }} - {{ $alamat->kota }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Data Baru -->
                                <div id="form-data-baru">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <label for="nama_penerima" class="form-label">Nama Penerima</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="telepon_penerima" class="form-label">Nomor Telepon / Whatsapp</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                                <input type="tel" class="form-control" id="telepon_penerima" name="telepon_penerima" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="nama_tempat_penerima" class="form-label">Nama Tempat / Bangunan</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                <input class="form-control" id="nama_tempat_penerima" name="nama_tempat_penerima" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="alamat_penerima" class="form-label">Alamat</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                <textarea class="form-control" id="alamat_penerima" name="alamat_penerima" rows="2" required></textarea>
                                            </div>
                                        </div>
                                        
                                        <!-- Kota Penerima -->
                                        <div class="col-md-4">
                                            <label for="kota_penerima" class="form-label">Kota</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                <input type="text" class="form-control" id="kota_penerima" name="kota_penerima" required>
                                            </div>
                                        </div>

                                        <!-- Provinsi Penerima -->
                                        <div class="col-md-4">
                                            <label for="provinsi_penerima" class="form-label">Provinsi</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-map"></i></span>
                                                <input type="text" class="form-control" id="provinsi_penerima" name="provinsi_penerima" required>
                                            </div>
                                        </div>

                                        <!-- Kode Pos Penerima -->
                                        <div class="col-md-4">
                                            <label for="kode_pos_penerima" class="form-label">Kode Pos</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                <input type="text" class="form-control" id="kode_pos_penerima" name="kode_pos_penerima" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary prev-step"><i class="fas fa-arrow-left me-2"></i> Kembali</button>
                                    <button type="button" class="btn btn-next next-step">Lanjut <i class="fas fa-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Step 3: Detail Barang -->
                        <div class="step step-3 d-none">
                            <h4 class="mb-4 border-bottom pb-2">Detail Barang</h4>
                            <div id="barang-wrapper">
                                <div class="barang-item mb-4" style="border: 1px solid var(--bprimary); border-radius: 8px; padding: 20px;">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="mb-0" style="color: var(--bprimary);">Barang 1</h5>
                                    </div>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Jenis Barang</label>
                                            <select class="form-select" name="jenis_barang[]" required>
                                                <option value="">Pilih Jenis Barang</option>
                                                <option value="Bangunan"><i class="fas fa-tags me-1"></i> Bangunan</option>
                                                <option value="Tekstil">Tekstil</option>
                                                <option value="Dokumen">Dokumen</option>
                                                <option value="Makanan">Makanan</option>
                                                <option value="Elektronik">Elektronik</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Berat (kg)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                                <input type="number" step="0.1" class="form-control" name="berat[]" placeholder="Contoh: 12.5" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Dimensi (Opsional)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-cube"></i></span>
                                                <input type="text" class="form-control" name="dimensi[]" placeholder="Contoh: 30x20x15">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Catatan Tambahan (Opsional)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                                <textarea class="form-control" name="catatan[]" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center mt-3">
                                        <button type="button" class="btn btn-tambah btn-tambah-barang">
                                            <i class="fas fa-plus me-2"></i>Tambah Barang
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Navigasi Kembali/Lanjut -->
                            <div class="col-12 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary prev-step"><i class="fas fa-arrow-left me-2"></i> Kembali</button>
                                <button type="button" class="btn btn-next next-step">Lanjut <i class="fas fa-arrow-right ms-2"></i></button>
                            </div>
                        </div>
                        
                        <!-- Step 4: Ringkasan & Pembayaran -->
                        <div class="step step-4 d-none">
                            <h4 class="mb-4 border-bottom pb-2" style="border-color: var(--bprimary) !important;">Ringkasan Pemesanan</h4>
                            
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-truck me-2"></i>Detail Pengiriman</h5>
                                    <div id="summaryContent"></div>
                                </div>
                            </div>
                            
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-boxes me-2"></i>Daftar Barang</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="itemsSummary">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Barang</th>
                                                    <th>Berat (kg)</th>
                                                    <th>Dimensi</th>
                                                    <th>Catatan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itemsList">
                                                <!-- Item timeline otomatis bertambah -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-calculator me-2"></i>Estimasi Biaya</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th><i class="fas fa-weight-hanging me-2"></i>Total Berat</th>
                                            <td id="summaryberat">0 kg</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-cube me-2"></i>Jumlah Barang</th>
                                            <td id="summaryItemsCount">0</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-money-bill-wave me-2"></i>Biaya Pengiriman</th>
                                            <td id="summaryCost">Rp 0</td>
                                        </tr>
                                        <tr class="table-active">
                                            <th><i class="fas fa-receipt me-2"></i>Total</th>
                                            <td id="summaryTotal">Rp 0</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary prev-step"><i class="fas fa-arrow-left me-2"></i> Kembali</button>
                                <button type="submit" class="btn btn-success" id="confirmButton">Konfirmasi Pemesanan <i class="fas fa-check ms-2"></i></button>
                            </div>
                            
                            <div class="alert alert-info mt-5 mb-0">
                                <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Informasi Penting</h5>
                                <p class="mb-0">
                                    Biayanya akan kami sampaikan setelah anda melakukan pemesanan, kami akan menghubungi anda untuk konfirmasi pemesanan lebih lanjut.
                                </p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .breadcrumb-item + .breadcrumb-item::before {
        color: white;
        font-size: 1rem;
    }
    
    .hero-section-mini {
        height: 350px;
        background: linear-gradient(135deg, var(--bprimary) 0%,rgb(0, 0, 0) 100%);
        border-radius: 0 0 15px 15px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.9);
        margin-bottom: 20px;
        /* background: rgba(0, 0, 0, 0.6) url('/img/truck.jpg') center/cover no-repeat; 
        background-blend-mode: darken; */
    }

    #particles-js {
        z-index: 0;
        opacity: 0.5;
    }
    
    .btn-primary {
        background-color: var(--bprimary);
        border-color: var(--bprimary);
    }
    
    .btn-primary:hover {
        background-color: var(--rprimary);
        border-color: var(--rprimary);
    }

    .step {
        transition: all 0.3s ease;
    }
    .icon-service {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .testimonial-carousel .owl-item {
        padding: 0 15px;
    }
    .testimonial-item {
        background: #f8f9fa;
        border-radius: 10px;
    }

    /* Formulir Pemesanan */
    .card-header {
        color: white;
        background-color: var(--bprimary);
    }

    .btn-next{
        color: white;
        background-color: var(--bprimary);
        border: 2px solid var(--bprimary);
    }

    .btn-next:hover{
        color: var(--bprimary);
        background-color: white;
        border: 2px solid var(--bprimary);
    }

    /* Tambah Barang */
    .btn-tambah {
        color: var(--bprimary);
        border: 1px solid var(--bprimary);
        background-color: white;
    }

    .btn-tambah:hover {
        color: white;
        border: 1px solid white;
        background-color: var(--bprimary);
    }

    .is-invalid {
        border-color: #E84855 !important;
    }

    .invalid-feedback {
        color: #E84855;
        font-size: 0.875em;
        display: block;
        margin-top: 0.25rem;
    }

    #data-toggle-group .nav-link {
        background-color: #fff;
        border: 1px solid transparent;
        color: #333;
        font-weight: 500;
        transition: all 0.1s ease;
    }

    #data-toggle-group .nav-link.active {
        color: #fff !important;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('bookingForm');
        const confirmBtn = document.getElementById('confirmButton');
        const confirmationMessage = document.getElementById('confirmationMessage');
        let confirmationShown = false;

        confirmBtn.addEventListener('click', function(e) {
            if (!confirmationShown) {
                e.preventDefault();
                confirmationMessage.style.display = 'block';
                confirmationMessage.scrollIntoView({ behavior: 'smooth', block: 'start' });
                setTimeout(() => {
                    window.scrollBy({ top: -200, left: 0, behavior: 'smooth' });
                }, 400);
                confirmationShown = true;
            } else {
                confirmationMessage.style.display = 'none';
            }
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // ---------------------------------------- Step Navigation ---------------------------------------- //
        // Kembali
        document.querySelectorAll('.prev-step').forEach(button => {
            button.addEventListener('click', function() {
                const currentStep = this.closest('.step');
                const prevStep = currentStep.previousElementSibling;
                
                currentStep.classList.remove('active');
                currentStep.classList.add('d-none');
                
                prevStep.classList.remove('d-none');
                prevStep.classList.add('active');
            });
        });

        // Lanjut
        document.querySelectorAll('.next-step').forEach(button => {
            button.addEventListener('click', function() {
                const currentStep = this.closest('.step');
                const nextStep = currentStep.nextElementSibling;
                
                if (validateStep(currentStep)) {
                    currentStep.classList.remove('active');
                    currentStep.classList.add('d-none');
                    
                    nextStep.classList.remove('d-none');
                    nextStep.classList.add('active');
                    
                    if(nextStep.classList.contains('step-4')) {
                        updateSummary();
                    }
                }
            });
        });

        // Form Validation
        function validateStep(step) {
            let isValid = true;
            step.querySelectorAll('[required]').forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            return isValid;
        }

        // ---------------------------------------- STEP 2 - Data Penerima ---------------------------------------- //

        // Toggle button dari data penerima
        const btnBaru = document.getElementById('btn-data-baru');
        const btnLama = document.getElementById('btn-data-lama');
        const formBaru = document.getElementById('form-data-baru');
        const formLama = document.getElementById('form-data-lama');

        function activateToggle(activeBtn, inactiveBtn) {
            const activeColor = activeBtn.dataset.color;
            const inactiveColor = inactiveBtn.dataset.color;

            activeBtn.classList.add('active');
            activeBtn.style.backgroundColor = activeColor;
            activeBtn.style.borderColor = activeColor;
            activeBtn.style.color = "#fff";

            inactiveBtn.classList.remove('active');
            inactiveBtn.style.backgroundColor = "#fff";
            inactiveBtn.style.borderColor = inactiveColor;
            inactiveBtn.style.color = inactiveColor;
        }

        btnBaru.addEventListener('click', function () {
            activateToggle(btnBaru, btnLama);
            formBaru?.classList.remove('d-none');
            formLama?.classList.add('d-none');
        });

        btnLama.addEventListener('click', function () {
            activateToggle(btnLama, btnBaru);
            formLama?.classList.remove('d-none');
            formBaru?.classList.add('d-none');
        });

        activateToggle(btnBaru, btnLama);
        formBaru?.classList.remove('d-none');
        formLama?.classList.add('d-none');

        // Old value dari data penerima
        document.getElementById('btn-data-lama').addEventListener('click', function() {
            document.getElementById('form-data-lama').classList.remove('d-none');
            document.getElementById('form-data-baru').classList.add('d-none');
        });

        document.getElementById('btn-data-baru').addEventListener('click', function() {
            document.getElementById('form-data-lama').classList.add('d-none');
            document.getElementById('form-data-baru').classList.remove('d-none');
        });

        document.getElementById('select-alamat-lama').addEventListener('change', function() {
            let selected = this.options[this.selectedIndex];
            document.getElementById('nama_penerima').value = selected.getAttribute('data-nama');
            document.getElementById('telepon_penerima').value = selected.getAttribute('data-telepon');
            document.getElementById('nama_tempat_penerima').value = selected.getAttribute('data-nama_tempat');
            document.getElementById('alamat_penerima').value = selected.getAttribute('data-alamat');
            document.getElementById('kota_penerima').value = selected.getAttribute('data-kota');
            document.getElementById('provinsi_penerima').value = selected.getAttribute('data-provinsi');
            document.getElementById('kode_pos_penerima').value = selected.getAttribute('data-kode_pos');
        });
        
        // ---------------------------------------- STEP 3 - Data Barang ---------------------------------------- //

        // Item Management
        const wrapper = document.getElementById("barang-wrapper");
        let barangCount = 1;

        // Function to add new item
        function tambahBarang() {
            barangCount++;
            const newItem = document.createElement('div');
            newItem.className = 'barang-item mb-4';
            newItem.innerHTML = `
                <div class="barang-container" style="border: 1px solid var(--bprimary); border-radius: 8px; padding: 20px; margin-bottom: 20px;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Barang ${barangCount}</h5>
                        <button type="button" class="btn btn-danger btn-remove-barang">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Jenis Barang</label>
                            <select class="form-select" name="jenis_barang[]" required>
                                <option value="">Pilih Jenis Barang</option>
                                <option value="Bangunan">Bangunan</option>
                                <option value="Tekstil">Tekstil</option>
                                <option value="Dokumen">Dokumen</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Berat (kg)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                <input type="number" step="0.1" class="form-control" name="berat[]" placeholder="Contoh: 12.5" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Dimensi</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-cube"></i></span>
                                <input type="text" class="form-control" name="dimensi[]" placeholder="Contoh: 30x20x15">
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Catatan Tambahan</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                <textarea class="form-control" name="catatan[]" rows="2"></textarea>
                            </div>
                        </div>
                                        
                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-tambah btn-tambah-barang">
                                <i class="fas fa-plus me-2"></i>Tambah Barang
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            wrapper.appendChild(newItem);

            // Tambahkan event listener ke tombol tambah barang dalam item baru
            newItem.querySelector('.btn-tambah-barang')?.addEventListener('click', tambahBarang);
            
            // Add event listener to new remove button
            newItem.querySelector('.btn-remove-barang').addEventListener('click', function() {
                if (document.querySelectorAll('.barang-item').length > 1) {
                    newItem.remove();
                    barangCount--;
                } else {
                    alert('Minimal harus ada 1 barang');
                }
            });
        }

        // Initialize first add button
        document.querySelector('.btn-tambah-barang')?.addEventListener('click', tambahBarang);

        // ---------------------------------------- STEP 4 - Summary ---------------------------------------- //

        // Update Summary
        function updateSummary() {
            const formData = $('#bookingForm').serializeArray();
            const data = {};
            const items = [];
            let totalberat = 0;
            
            // Organize form data
            $.each(formData, function(_, field) {
                if (field.name.endsWith('[]')) {
                    const baseName = field.name.slice(0, -2);
                    if (!data[baseName]) data[baseName] = [];
                    data[baseName].push(field.value);
                } else {
                    data[field.name] = field.value;
                }
            });
            
            // Process items
            if (data.jenis_barang && data.jenis_barang.length > 0) {
                for (let i = 0; i < data.jenis_barang.length; i++) {
                    const berat = parseFloat(data.berat[i]) || 0;
                    items.push({
                        type: data.jenis_barang[i],
                        berat: berat,
                        dimensi: data.dimensi[i] || '-',
                        catatan: data.catatan[i] || '-'
                    });
                    totalberat += berat;
                }
            }
            
            // Calculate cost (example: Rp 9,000 per kg)
            const costPerKg = 0;
            const totalCost = totalberat * costPerKg;
            
            // Update summary content
            $('#summaryContent').html(`
                <div class="row g-3 mb-3 mt-3">
                    <!-- Pengirim -->
                    <div class="col-md-6">
                        <div class="card h-100 border-start border-2" style="border-left: 5px solid #112D4E !important;">
                            <div class="card-body">
                                <h6 class="card-title mb-4 fw-bold" style="color: #112D4E;">
                                    <i class="fas fa-user-tie me-2"></i>Pengirim
                                </h6>
                                <div class="row mb-2">
                                    <div class="col-md-4 text-muted">Nama</div>
                                    <div class="col-md-8 fw-bold">${data.nama_pengirim} <small class="text-muted">(${data.telepon_pengirim})</small></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 text-muted">Nama Tempat</div>
                                    <div class="col-md-8">${data.nama_tempat_pengirim}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 text-muted">Alamat</div>
                                    <div class="col-md-8">
                                        <i class="fas fa-map-marker-alt me-1" style="color: #112D4E;"></i>
                                        <span class="text-muted small">${data.alamat_pengirim}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 text-muted">Kota/Provinsi</div>
                                    <div class="col-md-8">
                                        <i class="fas fa-city me-1" style="color: #112D4E;"></i>
                                        <span class="text-muted small">${data.kota_pengirim}, ${data.provinsi_pengirim} ${data.kode_pos_pengirim}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Penerima -->
                    <div class="col-md-6">
                        <div class="card h-100 border-start border-2" style="border-left: 5px solid #E84855 !important;">
                            <div class="card-body">
                                <h6 class="card-title mb-4 fw-bold" style="color: #E84855;">
                                    <i class="fas fa-user me-2"></i>Penerima
                                </h6>
                                <div class="row mb-2">
                                    <div class="col-md-4 text-muted">Nama</div>
                                    <div class="col-md-8 fw-bold">${data.nama_penerima} <small class="text-muted">(${data.telepon_penerima})</small></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 text-muted">Nama Tempat</div>
                                    <div class="col-md-8">${data.nama_tempat_penerima}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4 text-muted">Alamat</div>
                                    <div class="col-md-8">
                                        <i class="fas fa-map-marker-alt me-1" style="color: #E84855;"></i>
                                        <span class="text-muted small">${data.alamat_penerima}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 text-muted">Kota/Provinsi</div>
                                    <div class="col-md-8">
                                        <i class="fas fa-city me-1" style="color: #E84855;"></i>
                                        <span class="text-muted small">${data.kota_penerima}, ${data.provinsi_penerima} ${data.kode_pos_penerima}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `);
            
            // Update items list
            const itemsList = $('#itemsList');
            itemsList.empty();
            items.forEach((item, index) => {
                itemsList.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.type}</td>
                        <td>${item.berat.toFixed(1)} kg</td>
                        <td>${item.dimensi}</td>
                        <td>${item.catatan}</td>
                    </tr>
                `);
            });
            
            // Update summary numbers
            $('#summaryberat').text(totalberat.toFixed(1) + ' kg');
            $('#summaryItemsCount').text(items.length);
            $('#summaryCost').text('Rp ' + totalCost.toLocaleString('id-ID'));
            $('#summaryTotal').text('Rp ' + totalCost.toLocaleString('id-ID'));
        }
    });
</script>

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