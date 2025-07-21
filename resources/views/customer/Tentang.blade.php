@extends('customer.layout.main')

@section('title', 'Tentang Kami - RGB Transport')

@section('content')
<section class="hero-section-mini text-white py-5">
    <div id="particles-js" class="position-absolute top-0 start-0 w-100 h-50"></div>
    <div class="container text-center mt-5">
        <div class="row align-items-center pt-5 mt-5">
        <h1 class="display-4 fw-bold">Tentang Kami</h1>
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-2" style="z-index: 1">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('customer.index') }}" class="text-white text-decoration-none">Home</a>
                </li>
                <li class="breadcrumb-item active text-white" aria-current="page">Tentang</li>
            </ol>
        </nav>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section py-1 pb-5 position-relative overflow-hidden">
    <div class="container position-relative" style="z-index: 1;">
        <div class="row align-items-center g-5 mt-5 mb-5">
            <!-- Left: Content -->
            <div class="col-lg-6">
                <h6 class="text-start about-text pe-3">About</h6>
                <h1 class="display-4 fw-bold mb-1 text-title">PT. RGB Transport</h1>
                <p class="lead mb-4 position-relative ps-4 border-start border-3 border-title">Sebagai perusahaan logistik terkemuka di Indonesia, kami berkomitmen untuk memberikan layanan terbaik dengan jaminan 
                    <span class="text-span fw-bold">keamanan</span> dan <span class="text-span fw-bold">ketepatan waktu</span>. <br><br> Kami melayani pengiriman barang antarkota dan antarpulau dengan dukungan tim operasional yang <span class="text-span fw-bold">berpengalaman</span>. 
                    Dalam setiap proses pengiriman, kami berusaha menjaga kondisi barang <span class="text-span fw-bold">tetap aman</span>.
                </p>
                <div class="d-flex align-items-center gap-3 mt-4">
                    <div class="bg-primary-light rounded-circle p-2">
                        <i class="fas fa-check-circle fs-4" style="color: var(--bprimary)"></i>
                    </div>
                    <span class="text-muted">Terpercaya sejak 2003</span>
                </div>
            </div>
            
            <!-- Right: Image -->
            <div class="col-lg-6">
                <div class="about-image position-relative">
                    <img src="{{ asset('img/layanan1.jpg') }}" class="img-fluid rounded-4 shadow-lg w-100" alt="Tim RGB Transport">
                    <div class="about-badge text-white p-4 rounded-4 shadow text-center" style="background-color: var(--bprimary)">
                        <div class="display-4 fw-bold mb-1">500+</div>
                        <p class="mb-0 fs-5">Pelanggan Aktif</p>
                        <div class="stars mt-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="pe-lg-5">
                <div class="col about-features">
                    <!-- Feature 1 -->
                    <div class="row-md-4 mb-4">
                        <div class="feature-card hover-effect-about mb-4 p-4 rounded-4 bg-white shadow-sm h-100">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon rounded-circle me-4 flex-shrink-0 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-calendar-check fa-lg"></i>
                                </div>
                                <div>
                                    <h5 class="feature-title fw-bold mb-2">Pengalaman Lebih dari 23 Tahun</h5>
                                    <p class="mb-0 text-muted">Melayani ribuan pelanggan sejak tahun 2002 dengan reputasi yang terjaga.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="row-md-4 mb-4">
                        <div class="feature-card hover-effect-about mb-4 p-4 rounded-4 bg-white shadow-sm h-100">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon rounded-circle me-4 flex-shrink-0 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-map-marked-alt fa-lg"></i>
                                </div>
                                <div>
                                    <h5 class="feature-title fw-bold mb-2">Jaringan Nasional</h5>
                                    <p class="mb-0 text-muted">Melayani pengiriman ke seluruh wilayah Indonesia.</p>
                                </div>
                            </div>
                        </div>  
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="row-md-4 mb-4">
                        <div class="feature-card hover-effect-about p-4 rounded-4 bg-white shadow-sm h-100">
                            <div class="d-flex align-items-center">
                                <div class="feature-icon rounded-circle me-4 flex-shrink-0 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-truck-fast fa-lg"></i>
                                </div>
                                <div>
                                    <h5 class="feature-title fw-bold mb-2">Layanan Terintegrasi</h5>
                                    <p class="mb-0 text-muted">Dari pengambilan barang hingga pengiriman dengan sistem tracking.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visi & Misi -->
<section class="vision-mission py-0 pb-5">
    <div class="container mb-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold" style="color: var(--bprimary);">Visi & Misi</h2>
            <p class="lead">Komitmen kami untuk menjadi yang terbaik di industri logistik.</p>
            <div class="divider mx-auto"></div>
        </div>

        <div class="row g-4">
            <!-- Visi Card -->
            <div class="col-lg-6">
                <div class="card vision-card h-100 border-0 shadow-lg hover-effect">
                    <div class="card-body p-4 p-xl-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-wrapper icon-vision rounded-circle me-3">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <h3 class="mb-0">Visi Perusahaan</h3>
                        </div>
                        <p class="vision-text fs-5" style="text-align: justify;">
                            <i class="fas fa-quote-left text-secondary"></i>
                            Menjadi mitra logistik yang dapat diandalkan dalam pengiriman barang dengan mengutamakan kepercayaan, ketepatan, dan pelayanan 
                            yang konsisten. Serta terus berkembang untuk memberikan solusi pengiriman yang aman dan sesuai dengan kebutuhan pelanggan.
                            <i class="fas fa-quote-right ms-1 text-secondary"></i>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Misi Card -->
            <div class="col-lg-6">
                <div class="card mission-card h-100 border-0 shadow-lg hover-effect">
                    <div class="card-body p-4 p-xl-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-wrapper icon-mission rounded-circle me-3">
                                <i class="fas fa-tasks"></i>
                            </div>
                            <h3 class="mb-0">Misi Perusahaan</h3>
                        </div>
                        <ul class="mission-list">
                            <li class="d-flex mb-3">
                                <span class="fas fa-chevron-right mt-1 me-3"></span>
                                <span>Menyediakan layanan logistik yang andal dan efisien</span>
                            </li>
                            <li class="d-flex mb-3">
                                <span class="fas fa-chevron-right mt-1 me-3"></span>
                                <span>Mengembangkan solusi berbasis teknologi untuk kemudahan pelanggan</span>
                            </li>
                            <li class="d-flex mb-3">
                                <span class="fas fa-chevron-right mt-1 me-3"></span>
                                <span>Menjaga keamanan dan ketepatan waktu pengiriman</span>
                            </li>
                            <li class="d-flex mb-3">
                                <span class="fas fa-chevron-right mt-1 me-3"></span>
                                <span>Memberikan nilai tambah bagi semua stakeholder</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.breadcrumb-item + .breadcrumb-item::before {
    color: white;
    font-size: 1rem;
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

.hero-section-mini {
    height: 350px;
    background: linear-gradient(135deg, var(--bprimary) 0%,rgb(0, 0, 0) 100%);
    border-radius: 0 0 15px 15px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.9);
    margin-bottom: 20px;
}

/* About */
.text-title {
    color: var(--bprimary);
    padding-bottom: 70px;
}

.feature-icon {
    width: 60px;
    height: 60px;
    transition: all 0.3s ease;
    color: white;
    background: var(--bprimary);
}

.feature-title {
    color: var(--bprimary);
}

.feature-card {
    border-left: 4px solid var(--bprimary);
}

.feature-card:hover {
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.feature-card:hover .feature-icon {
    transform: scale(1.5);
    background: white;
    color: var(--bprimary);
}

@keyframes bounce-upp {
    0%   { transform: translateX(0); }
    40%  { transform: translateX(-13px); }
    60%  { transform: translateX(-8px); }
    80%  { transform: translateX(-10px); }
    100% { transform: translateX(-10px); }
}

@keyframes bounce-downn {
    0%   { transform: translateX(-10px); }
    40%  { transform: translateX(8px); }
    60%  { transform: translateX(-3px); }
    100% { transform: translateX(0); }
}

.hover-effect-about {
    animation: bounce-downn 1s forwards;
}

.hover-effect-about:hover {
    animation: bounce-upp 0.6s forwards;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.about-image {
    position: relative;
}

.about-badge {
    position: absolute;
    bottom: -30px;
    right: 30px;
    width: 180px;
    transition: all 0.3s ease;
}

.about-badge:hover {
    transform: scale(1.1) rotate(2deg);
}

@media (max-width: 992px) {
    .about-badge {
        bottom: -20px;
        right: 20px;
        width: 150px;
    }
    
    .about-image {
        margin-top: 50px;
    }
}

.border-title {
    border-color: var(--rprimary) !important;
}

.text-span {
    color: var(--bprimary);
    font-weight: bold;
}

/* Visi & Misi */
.divider {
    position: relative;
    width: 200px;
    height: 6px;
    background-color: var(--bprimary);
    background: linear-gradient(to right, var(--bprimary), var(--rprimary));
    border-radius: 10px;
    overflow: hidden;
}

.divider::before {
    content: "";
    position: absolute;
    top: 0;
    left: -10px;
    width: 10px;
    height: 100%;
    background-color: var(--rprimary);
    background-color: white;
    border-radius: 10px;
    animation: move-dot 3s infinite ease-in-out;
}
    
@keyframes move-dot {
    0%   { left: 0%; }
    /* 50%  { left: 50%; } */
    100% { left: 100%; }
}

@keyframes bounce-up {
    0%   { transform: translateY(0); }
    40%  { transform: translateY(-15px); }
    60%  { transform: translateY(-10px); }
    80%  { transform: translateY(-12px); }
    100% { transform: translateY(-12px); }
}

@keyframes bounce-down {
    0%   { transform: translateY(-15px); }
    40%  { transform: translateY(10px); }
    60%  { transform: translateY(-5px); }
    100% { transform: translateY(0); }
}

.hover-effect {
    animation: bounce-down 0.7s forwards;
}

.hover-effect:hover {
    animation: bounce-up 0.6s forwards;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.icon-vision {
    background: var(--bprimary);
    color: white;
}

.icon-mission {
    background: var(--rprimary);
    color: white;
}

/* === Visi & Misi Cards === */
.vision-card,
.mission-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    position: relative;
    transition: box-shadow 0.5s;
}

.vision-card::after {
    content: "";
    position: absolute;
    left: 0; right: 0; bottom: 0;
    height: 100%;
    background: var(--bprimary);
    z-index: 1;
    transform: scaleY(0);
    transform-origin: bottom;
    transition: transform 0.5s;
    pointer-events: none;
}

.vision-card:hover .icon-vision {
    color: var(--bprimary);
    background: white;
}

.mission-card::after {
    content: "";
    position: absolute;
    left: 0; right: 0; bottom: 0;
    height: 100%;
    background: var(--rprimary);
    z-index: 1;
    transform: scaleY(0);
    transform-origin: bottom;
    transition: transform 0.5s;
    pointer-events: none;
}

.mission-card:hover .icon-mission {
    color: var(--rprimary);
    background: white;
}

.vision-card:hover::after,
.mission-card:hover::after {
    transform: scaleY(1);
}

.vision-card .card-body,
.mission-card .card-body {
    position: relative;
    z-index: 2;
    transition: color 0.3s;
}

.vision-card:hover .card-body,
.mission-card:hover .card-body {
    color: #fff;
}

/* === Icon & Bullet Points === */
.icon-wrapper {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mission-list {
    list-style: none;
    padding-left: 0;
}

.vision-text, .mission-list li {
    font-size: 1.1rem;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .vision-text, .mission-list li {
        font-size: 1rem !important;
    }
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