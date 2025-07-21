@extends('customer.layout.main')

@section('title', 'Selamat Datang - RGB Transport')

@section('content')
<!-- HERO Section -->
<section class="hero-section text-white position-relative overflow-hidden">
  <div id="particles-js" class="position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="container">
        <div class="row align-items-center pt-5 mt-5">
            <div class="col-lg-6 order-lg-1 order-2 my-5">
                <h1 class="display-4 fw-bold mb-3" data-aos="fade-right">Solusi Logistik Terpercaya</h1>
                <p class="lead mb-4" data-aos="fade-right" data-aos-delay="200">PT. RGB Transport menyediakan layanan pengiriman barang profesional dengan jaminan keamanan dan ketepatan waktu pengiriman.</p>
                <div class="hero-button d-flex flex-wrap gap-3">
                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-pesan btn-lg px-4 shadow-lg" data-aos="fade-right" data-aos-delay="400">
                        <i class="fas fa-truck me-2"></i>Pesan Sekarang
                    </a>
                    <a href="#layanan" class="btn btn-layanan btn-lg px-4 shadow" data-aos="fade-left" data-aos-delay="400">
                        <i class="fas fa-info-circle me-2"></i>Layanan Kami
                    </a>
                </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1 text-center" data-aos="zoom-in" data-aos-delay="600">
                <img src="{{ asset('img/illustrations/undraw_delivery-truck_mjui.svg') }}" alt="Ilustrasi Pengiriman" class="hero-illustration img-fluid">
            </div>
        </div>
    </div>
  </div>
</section>

<!-- LAYANAN --> 
<section class="services py-5 mt-4 mb-4" id="layanan" data-aos="fade-up">
  <div class="container">
    <!-- Header Section -->
    <div class="text-center mb-5" data-aos="fade-down">
      <h2 class="display-5 fw-bold" style="color: var(--bprimary);">Layanan Kami</h2>
      <p class="lead">Berbagai solusi logistik untuk kebutuhan bisnis Anda</p>
      <div class="divider mx-auto"></div>
    </div>

    <!-- Services Grid -->
    <div class="row g-4">
      <!-- Service 1 -->
      <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="100">
        <div class="card service-card h-100 border-0 shadow-sm hover-effect">
          <div class="card-body p-4 text-center">
            <div class="service-icon mb-3">
              <i class="fas fa-truck text-white"></i>
            </div>
            <h3 class="h4">Pengiriman Antarpabrik</h3>
            <p class="text-muted">Layanan khusus untuk pengiriman antar lokasi industri dengan efisiensi tinggi.</p>
            <a href="{{ route('customer.layanan') }}" class="btn btn-custom mt-2">Selengkapnya</a>
          </div>
        </div>
      </div>

      <!-- Service 2 -->
      <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="300">
        <div class="card service-card h-100 border-0 shadow-sm hover-effect">
          <div class="card-body p-4 text-center">
            <div class="service-icon mb-3">
              <i class="fas fa-boxes text-white"></i>
            </div>
            <h3 class="h4">Jasa Angkut Barang</h3>
            <p class="text-muted">Angkutan berbagai jenis barang termasuk berat dan volume besar.</p>
            <a href="{{ route('customer.layanan') }}" class="btn btn-custom mt-2">Selengkapnya</a>
          </div>
        </div>
      </div>

      <!-- Service 3 -->
      <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="500">
        <div class="card service-card h-100 border-0 shadow-sm hover-effect">
          <div class="card-body p-4 text-center">
            <div class="service-icon mb-3">
              <i class="fas fa-map-marked-alt text-white"></i>
            </div>
            <h3 class="h4">Status Pengiriman</h3>
            <p class="text-muted">Pantau status pengiriman secara real-time melalui sistem kami.</p>
            <a href="{{ route('customer.layanan') }}" class="btn btn-custom mt-2">Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PROSES PENGIRIMAN -->
<section class="py-5 position-relative overflow-hidden">
  <!-- Decorative elements -->
  <div class="container position-relative mb-5" style="z-index: 1;">
    <div class="text-center mb-5">
      <h2 class="display-5 fw-bold" style="color: var(--bprimary);">Proses Pengiriman Mudah</h2>
      <p class="lead">Hanya perlu 3 langkah sederhana untuk pengiriman barang Anda</p>
      <!-- <div class="divider mx-auto"></div> -->
    </div>
    
    <div class="row align-items-center g-5">
      <!-- Left: Steps -->
      <div class="col-lg-6">
        <!-- Step 1 -->
        <div class="step-card mb-4 p-4 rounded-4 bg-white" data-aos="fade-right" data-aos-delay="400">
          <div class="d-flex align-items-center">
            <div class="step-icon text-white rounded-circle me-4 flex-shrink-0 d-flex align-items-center justify-content-center">
              <i class="fas fa-file-alt"></i>
            </div>
            <div>
              <h5 class="fw-bold mb-2" style="color: var(--bprimary);">Pesan Layanan</h5>
              <p class="mb-0 text-muted">Isi formulir pemesanan dengan detail pengiriman.</p>
            </div>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="step-card mb-4 p-4 rounded-4 bg-white" data-aos="fade-right" data-aos-delay="600">
          <div class="d-flex align-items-center">
            <div class="step-icon text-white rounded-circle me-4 flex-shrink-0 d-flex align-items-center justify-content-center">
              <i class="fas fa-phone-alt"></i>
            </div>
            <div>
              <h5 class="fw-bold mb-2" style="color: var(--bprimary);">Konfirmasi</h5>
              <p class="mb-0 text-muted">Tim kami akan menghubungi untuk konfirmasi pesanan.</p>
            </div>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="step-card p-4 rounded-4 bg-white" data-aos="fade-right" data-aos-delay="700">
          <div class="d-flex align-items-center">
            <div class="step-icon text-white rounded-circle me-4 flex-shrink-0 d-flex align-items-center justify-content-center">
              <i class="fas fa-truck"></i>
            </div>
            <div>
              <h5 class="fw-bold mb-2" style="color: var(--bprimary);">Barang Dikirim</h5>
              <p class="mb-0 text-muted">Lacak status pengiriman melalui nomor resi.</p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Right: Image -->
      <div class="col-lg-6 text-center" data-aos="zoom-in">
        <div class="position-relative">
          <img src="{{ asset('img/layanan11.jpg') }}" alt="Ilustrasi Pengiriman" class="img-fluid rounded-4 shadow-lg" style="max-height: 400px;">
          <div class="position-absolute bottom-0 start-0 text-white p-3 rounded-end" style="background: var(--bprimary); transform: translateY(50%);">
            <div class="d-flex align-items-center">
              <i class="fas fa-check-circle fa-2x me-2"></i>
              <div>
                <h6 class="mb-0 fw-bold">100% Terpercaya</h6>
                <small>Jaminan barang sampai</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonial Start -->
<section class="py-2">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mb-5">
              <h2 class="display-5 fw-bold" style="color: var(--bprimary);">Testimoni Pengiriman</h2>
              <p class="lead">Apa kata pelanggan setelah menggunakan jasa kami?</p>
              <div class="divider mx-auto"></div>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-aos="flip-left" data-aos-offset="0">
                @foreach($testimoni as $testi)
                  <div class="testimonial-item bg-light rounded ps-4 pt-4 pe-4 ms-2 me-2" data-aos="flip-left" data-aos-delay="600">
                      <div class="d-flex align-items-center mb-4">
                          <img class="flex-shrink-0 rounded-circle border p-1" src="{{ asset($testi->photo) }}" alt="">
                          <div class="ms-4">
                              <h5 class="mb-1">{{ $testi->name }}</h5>
                              <div class="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                  @if ($i <= $testi->rating)
                                    <i class="fas fa-star"></i>
                                  @else
                                    <i class="far fa-star"></i>
                                  @endif
                                @endfor
                              </div>
                          </div>
                      </div>
                      <p class="mb-0">{{ $testi->comment }}</p>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5 position-relative overflow-hidden">
    <div class="container position-relative mt-2 mb-2">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="cta-content p-5 rounded-4 bg-white" data-aos="zoom-in" data-aos-delay="100" data-aos-offset="400">
                    <h2 class="display-5 fw-bold text-center" style="color: var(--bprimary);">Siap Mengirimkan Barang Anda?</h2>
                    <p class="lead text-center mb-5">Dapatkan penawaran terbaik untuk kebutuhan logistik bisnis Anda</p>
                    
                    <div class="d-flex flex-wrap justify-content-center gap-4">
                        <a href="{{ route('customer.pemesanan') }}" class="btn btn-cta btn-lg rounded-pill cta-btn">
                            <i class="fas fa-paper-plane me-2"></i> Pesan Sekarang
                        </a>
                        <a href="{{ route('customer.kontak') }}" class="btn btn-outline-cta btn-lg rounded-pill cta-btn">
                            <i class="fas fa-headset me-2"></i> Hubungi Kami
                        </a>
                    </div>
                    
                    <!-- Trust badges -->
                    <div class="mt-1 pt-3 trust-badges">
                        <div class="d-flex flex-wrap justify-content-center gap-4">
                            <div class="badge-item">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>100% Terpercaya</span>
                            </div>
                            <div class="badge-item">
                                <i class="fas fa-clock text-warning me-2"></i>
                                <span>Respon Cepat</span>
                            </div>
                            <div class="badge-item">
                                <i class="fas fa-shield-alt text-primary me-2"></i>
                                <span>Garansi Pengiriman</span>
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
    /* ============================= HERO ============================= */
    .hero-section {
        height: 750px;
        background: linear-gradient(135deg, var(--bprimary) 0%,rgb(0, 0, 0) 100%);
        border-radius: 0 0 15px 15px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.9);
        margin-bottom: 20px;
        padding-top: 100px;
        /* padding-bottom: 100px; */
        background: rgba(0, 0, 0, 0.6) url('/img/truck.jpg') center/cover no-repeat; 
        background-blend-mode: darken;
    }
    
    .animate-float {
        animation: float 5s ease-in-out infinite;
    }

    #particles-js {
        z-index: 0;
        opacity: 0.5;
    }

    .hero-section .container {
        position: relative;
        z-index: 1;
    }

    .btn-pesan{
        color: white;
        border: 2px solid var(--rprimary);
        background-color: var(--rprimary);
    }
    
    .btn-pesan:hover{
        color: var(--rprimary);
        border: 2px solid white;
        background-color: white;
    }

    .btn-layanan{
        color: var(--bprimary);
        border: 2px solid white;
        background-color: white;
    }
    
    .btn-layanan:hover{
        color: white;
        border: 2px solid white;
        background-color: transparent;
    }
    
    @keyframes float {
        0%, 100% { transform: translateX(55px); }
        50% { transform: translateX(-35px); }
    }

    @media (max-width: 992px) {
      /* Index Hero Section */
      .hero-section {
          text-align: center;
          height: 950px;
          background: linear-gradient(180deg, var(--bprimary) 0%,rgb(0, 0, 0) 100%);
          border-radius: 0 0 15px 15px;
          box-shadow: 0 10px 10px rgba(0, 0, 0, 0.9);
          margin-bottom: 20px;
          padding-top: 200px;
      }

      .hero-logo {
        width: 400px;
      }

      .animate-float {
          animation: float 5s ease-in-out infinite;
      }
      
      @keyframes float {
          0%, 100% { transform: translateX(55px); }
          50% { transform: translateX(-55px); }
      }

      .hero-section .container .pt-5 {
        padding-top: 0 !important;
      }
      .hero-section .container .mt-5 {
        margin-top: 0 !important;
      }
      
      .hero-button {
        flex-direction: column;
        margin: 5px 20px;
      }
    }

    @media (max-width: 600px) {
      /* Index Hero Section */
      .hero-section {
          text-align: center;
          height: 950px;
          background: linear-gradient(180deg, var(--bprimary) 0%,rgb(0, 0, 0) 100%);
          border-radius: 0 0 15px 15px;
          box-shadow: 0 10px 10px rgba(0, 0, 0, 0.9);
          margin-bottom: 20px;
      }

      .hero-logo {
        width: 300px;
      }
    }

    /* ============================= LAYANAN ============================= */
    #layanan {
      scroll-margin-top: 120px;
    }

    .card .col-md-6 {
      transition: transform 0.4s ease;
    }
    .card:hover .col-md-6 {
      transform: scale(1.03);
    }

    .btn-custom {
      background-color: var(--bprimary);
      color: white;
      border: 3px solid var(--bprimary);
      border-radius: 30px;
      padding: 7px 15px;
    }

    .btn-custom:hover {
      background-color: transparent;
      color: var(--rprimary);
      border: 3px solid var(--rprimary);
    }

    .service-card {
        transition: all 0.5s ease;
        border-radius: 10px;
        background: white;
        padding-bottom: 10px;
    }
    
    .service-card:hover .btn-custom{
      color: white;
      background-color: var(--rprimary);
      border: 3px solid var(--rprimary);
      transition: all 0.3s ease;
    }
    
    .service-card:hover .btn-custom:hover{
      color: var(--rprimary);
      background-color: transparent;
      border: 3px solid var(--rprimary);
    }

    .service-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        font-size: 24px;
        background: var(--bprimary);
        transition: transform 0.5s;
        transform: rotateY(0deg);
    }
    
    .service-card:hover .service-icon {
        transform: rotateY(180deg);
        background: var(--rprimary) !important;
        transition: all 0.3s ease;
    }

    .hover-effect:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
  
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
    
    @media (max-width: 768px) {
      .service-card {
        margin-bottom: 20px;
      }
      .service-icon {
        width: 50px;
        height: 50px;
      }
    }

    /* ============================= PROSES PENGIRIMAN ============================= */
    .step-icon {
      width: 60px;
      height: 60px;
      font-size: 1.4rem;
      background: var(--bprimary);
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      transform: scale(1);
      transition: all 0.3s ease;
    }

    .step-card {
      transition: all 0.3s ease;
      border-left: 4px solid transparent;
      box-shadow: 0 7px 20px rgba(0,0,0,0.2);
    }

    .step-card:hover {
      transform: translateY(-5px);
      border-left: 4px solid var(--rprimary);
      box-shadow: 0 10px 20px rgba(0,0,0,0.3);
    }

    .step-card:hover .step-icon {
      transform: scale(0.7);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      background: var(--rprimary);
    }

    /* ============================= TESTIMONIAL =============================*/
    .testimonial-carousel .owl-item .testimonial-item img {
        width: 60px;
        min-height: 60px;
    }

    .testimonial-carousel .owl-item .testimonial-item {
        margin-top: 10px;
        margin-bottom: 30px;
        box-shadow: 2px 2px 10px rgba(0,0,0,0.5);
    }
    .testimonial-carousel .owl-item .testimonial-item * {
        transition: .5s;
    }

    .testimonial-carousel .owl-item.center .testimonial-item {
        transform: scale(1.02);
        background: var(--bprimary) !important;
        box-shadow: 10px 10px 3px rgba(0,0,0,1);
    }

    .testimonial-carousel .owl-item.center .testimonial-item * {
        color: #FFFFFF;
    }

    .rating {
        color:rgb(241, 4, 4) !important;
    }

    .testimonial-carousel .owl-nav {
        margin-top: 30px;
        display: flex;
        justify-content: center;
    }

    .testimonial-carousel .owl-nav .owl-prev i,
    .testimonial-carousel .owl-nav .owl-next i {
        margin: 0 100px;
        margin-top: 10px;
        margin-bottom: -42px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50px;
        font-size: 18px;
        transition: .3s;
        color: var(--bprimary);
        background: transparent;
        border: 2.5px solid var(--bprimary);
      }
      
      .testimonial-carousel .owl-nav .owl-prev:hover i,
      .testimonial-carousel .owl-nav .owl-next:hover i {
        color: white;
        background: var(--bprimary);
        border: 2.5px solid var(--bprimary);
      }

      .testimonial-carousel .owl-dots {
          margin-top: 15px;
          display: flex;
          align-items: flex-end;
          justify-content: center;
      }

      .testimonial-carousel .owl-dot {
          position: relative;
          display: inline-block;
          margin: 0 5px;
          width: 15px;
          height: 15px;
          border: 4px solid var(--bprimary) !important;
          border-radius: 3px;
          transition: .5s;
      }

      .testimonial-carousel .owl-dot.active {
          width: 30px;
          background: var(--bprimary) !important;
          border: 2px solid var(--bprimary);
      }

    /* ============================= CTA =============================*/
    .cta-content {
        position: relative;
        z-index: 1;
        border: 3px solid var(--bprimary);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .cta-btn {
        transition: all 0.3s ease;
        font-weight: 600;
        border-width: 2px;
    }

    .cta-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .btn-cta {
        color: white;
        background-color: var(--bprimary);
        border-color: var(--bprimary);
    }

    .btn-cta:hover {
        color: var(--bprimary);
        background-color: transparent;
        border-color: var(--bprimary);
    }

    .btn-outline-cta {
        color: var(--bprimary);
        border-color: var(--bprimary);
    }

    .btn-outline-cta:hover {
        color: white;
        background-color: var(--bprimary);
        border-color: var(--bprimary);
    }

    .trust-badges .badge-item {
        display: flex;
        align-items: center;
        margin-top: 10px;
        padding: 8px 15px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 50px;
        box-shadow: 0px 1px 2px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    }

    .trust-badges .badge-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    @media (max-width: 768px) {
        .cta-content {
            padding: 2rem !important;
        }
        .cta-btn {
            width: 100%;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Testimoni carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 800,
        margin: 25,
        loop: true,
        center: true,
        dots: true,
        nav: false,
        navText : [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        autoplayTimeout: 8000,
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    function equalizeTestimonialHeights() {
        let maxHeight = 0;
        $(".testimonial-item").each(function () {
            let thisHeight = $(this).outerHeight();
            if (thisHeight > maxHeight) {
                maxHeight = thisHeight;
            }
        });
        $(".testimonial-item").height(maxHeight);
    }

    $(document).ready(function() {
        equalizeTestimonialHeights();
        $(window).on('resize', function () {
            $(".testimonial-item").css('height', 'auto');
            equalizeTestimonialHeights();
        });
    });
</script>

<script>
  AOS.init({
    once: true
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