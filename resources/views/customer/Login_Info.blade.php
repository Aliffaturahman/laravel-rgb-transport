@extends('customer.layout.main')

@section('title', 'Login Required - RGB Transport')

@section('content')
<section class="hero-section-mini text-white py-5">
  <div id="particles-js" class="position-absolute top-0 start-0 w-100 h-50"></div>
    <div class="container text-center mt-5">
        <div class="row align-items-center pt-5 mt-5">
            <h1 class="display-4 fw-bold">Login Required</h1>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-2" style="z-index: 1">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('customer.index') }}" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        Login Required
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    </div>
</section>

<!-- Authentication Information Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <!-- Premium Card -->
                <div class="card border-0 rounded-4 shadow-lg overflow-hidden mb-5">
                    <div class="row g-0">
                        <!-- Left Side - Premium Illustration -->
                        <div class="col-md-6 d-none d-md-flex align-items-center position-relative">
                            <div class="position-absolute w-100 h-100 bg-primary-gradient opacity-90"></div>
                            <div class="p-5 text-center position-relative z-index-1 w-100">
                                <div class="animated-illustration mb-4">
                                    <img src="{{ asset('img/login.png') }}" alt="Login Illustration" class="img-fluid floating" style="max-height: 280px;">
                                </div>
                                <h3 class="text-white mt-4 fw-bold">Selamat Datang</h3>
                                <p class="text-white-80 mb-0">Masuk untuk mengakses semua layanan kami</p>
                                <div class="mt-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="border-top border-white border-2 w-25 me-3"></div>
                                        <span class="text-white-60 small">RGB Transport</span>
                                        <div class="border-top border-white border-2 w-25 ms-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Side - Premium Content -->
                        <div class="col-md-6 bg-white">
                            <div class="p-4 p-xl-5">
                                <div class="text-center mb-4">
                                    <div class="icon-lock mb-4">
                                        <i class="fas fa-lock fa-3x" style="color: #112D4E;"></i>
                                        <div class="lock-circle"></div>
                                    </div>
                                    <h2 class="fw-bold mb-2 text-gradient-primary">Akses Membutuhkan Login</h2>
                                    <p class="text-muted">Silakan login untuk melanjutkan ke halaman yang dituju</p>
                                </div>

                                <!-- Premium Steps -->
                                <div class="premium-steps mt-4 mb-4">
                                    <div class="step-card mb-3">
                                        <div class="step-number-bg">
                                            <span class="step-number">1</span>
                                        </div>
                                        <div class="step-content">
                                            <h5 class="mb-1 fw-semibold">Login ke Akun Anda</h5>
                                            <p class="text-muted mb-0 small">Gunakan email dan password yang terdaftar</p>
                                        </div>
                                    </div>

                                    <div class="step-card mb-3">
                                        <div class="step-number-bg">
                                            <span class="step-number">2</span>
                                        </div>
                                        <div class="step-content">
                                            <h5 class="mb-1 fw-semibold">Verifikasi Data Diri</h5>
                                            <p class="text-muted mb-0 small">Pastikan profil Anda sudah lengkap</p>
                                        </div>
                                    </div>

                                    <div class="step-card">
                                        <div class="step-number-bg">
                                            <span class="step-number">3</span>
                                        </div>
                                        <div class="step-content">
                                            <h5 class="mb-1 fw-semibold">Akses Penuh Layanan</h5>
                                            <p class="text-muted mb-0 small">Nikmati semua fitur layanan kami</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Premium Action Buttons -->
                                <div class="d-grid gap-3 mt-5">
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-hover-scale py-2">
                                        <i class="fas fa-sign-in-alt me-2"></i> Login Sekarang
                                    </a>
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg btn-hover-scale py-2">
                                        <i class="fas fa-user-plus me-2"></i> Daftar Akun Baru
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Premium Benefits Section -->
                <div class="card border-0 rounded-4 shadow-sm bg-white overflow-hidden">
                    <div class="card-header bg-transparent border-0 py-4">
                        <h3 class="text-center mb-0 text-gradient-primary">Keuntungan Memiliki Akun</h3>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="benefit-card h-100">
                                    <div class="benefit-icon bg-soft-primary">
                                        <i class="fas fa-bolt"></i>
                                    </div>
                                    <div class="benefit-content">
                                        <h5 class="fw-semibold mb-2">Pemesanan Cepat</h5>
                                        <p class="text-muted small mb-0">Proses pengisian data pemesanan lebih efisien menggunakan data yang sudah tersimpan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="benefit-card h-100">
                                    <div class="benefit-icon bg-soft-primary">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    <div class="benefit-content">
                                        <h5 class="fw-semibold mb-2">Riwayat Pemesanan</h5>
                                        <p class="text-muted small mb-0">Akses semua riwayat pemesanan Anda</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="benefit-card h-100">
                                    <div class="benefit-icon bg-soft-primary">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="benefit-content">
                                        <h5 class="fw-semibold mb-2">Notifikasi Real-time</h5>
                                        <p class="text-muted small mb-0">Dapatkan update status pengiriman</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="benefit-card h-100">
                                    <div class="benefit-icon bg-soft-primary">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="benefit-content">
                                        <h5 class="fw-semibold mb-2">Berikan Testimoni</h5>
                                        <p class="text-muted small mb-0">Bagikan pengalaman menggunakan layanan kami</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Base Styles */
    .breadcrumb-item + .breadcrumb-item::before {
        color: white;
        font-size: 1rem;
    }

    .hero-section-mini {
        height: 350px;
        background: linear-gradient(135deg, var(--bprimary) 0%, rgb(0, 0, 0) 100%);
        border-radius: 0 0 15px 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    #particles-js {
        z-index: 0;
        opacity: 0.5;
    }
    
    .bg-soft-primary {
        background-color: rgba(17, 45, 78, 0.03);
    }
    
    .bg-primary-gradient {
        background: linear-gradient(135deg, var(--bprimary) 0%, rgb(0, 0, 0) 100%);
    }
    
    .text-gradient-primary {
        background: linear-gradient(to right, var(--bprimary), rgb(0, 0, 0));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .text-white-80 {
        color: rgba(255, 255, 255, 0.8);
    }
    
    .text-white-60 {
        color: rgba(255, 255, 255, 0.6);
    }
    
    /* Card Styles */
    .rounded-4 {
        border-radius: 1.25rem !important;
    }
    
    .shadow-lg {
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }
    
    /* Illustration Animation */
    .floating {
        animation: floating 3s ease-in-out infinite;
    }
    
    @keyframes floating {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    
    /* Lock Icon Animation */
    .icon-lock {
        position: relative;
        display: inline-block;
    }
    
    .lock-circle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80px;
        height: 80px;
        border: 2px dashed rgba(17, 45, 78, 0.3);
        border-radius: 50%;
        animation: spin 15s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }
    
    /* Step Cards */
    .premium-steps {
        position: relative;
        padding-left: 40px;
    }
    
    .premium-steps:before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: var(--bprimary);
    }
    
    .step-card {
        position: relative;
        display: flex;
        align-items: flex-start;
        padding: 15px;
        border-radius: 10px;
        transition: all 0.3s ease;
        background-color: rgba(17, 45, 78, 0.03);
    }
    
    .step-card:hover {
        background-color: rgba(17, 45, 78, 0.08);
        transform: translateX(5px);
    }
    
    .step-number-bg {
        flex-shrink: 0;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-color: var(--bprimary);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }
    
    .step-number {
        color: white;
        font-weight: bold;
        font-size: 0.9rem;
    }
    
    /* Benefit Cards */
    .benefit-card {
        display: flex;
        align-items: center;
        padding: 20px;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .benefit-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }

    .benefit-icon {
        color: #112D4E;
        flex-shrink: 0;
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        margin-right: 15px;
    }

    .benefit-card:hover .benefit-icon {
        color: #E84855;
    }
    
    /* Buttons */
    .btn-primary {
        background-color: var(--bprimary);
        border-color: var(--bprimary);
        padding: 0.8rem 1.5rem;
        font-weight: 400;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
    }

    .btn-primary:hover {
        background-color: var(--rprimary);
        border-color: var(--rprimary);
    }
    
    .btn-outline-primary {
        color: var(--bprimary);
        border-color: var(--bprimary) !important;
        font-weight: 400;
        letter-spacing: 0.5px;
    }
    
    .btn-outline-primary:hover {
        background-color: var(--bprimary);
        color: white;
    }
    
    .btn-hover-scale {
        transition: all 0.3s ease;
    }
    
    .btn-hover-scale:hover {
        transform: scale(0.98);
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