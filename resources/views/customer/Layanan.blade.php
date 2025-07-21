@extends('customer.layout.main')

@section('title', 'Layanan - RGB Transport')

@section('content')
<section class="hero-section-mini text-white py-5">
    <div id="particles-js" class="position-absolute top-0 start-0 w-100 h-50"></div>
        <div class="container text-center mt-5">
            <div class="row align-items-center pt-5 mt-5">
                <h1 class="display-4 fw-bold">Layanan</h1>
                <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-2" style="z-index: 1">
                    <ol class="breadcrumb bg-transparent mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('customer.index') }}" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            Layanan
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Detail Layanan -->
<section class="py-5">

  <!-- Card 1 -->
  <div class="container-xxl py-5">
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
                  <div class="img-border">
                      <img class="img-fluid" src="{{ asset('img/layanan11.jpg') }}" alt="">
                  </div>
              </div>
              <div class="col-lg-6" data-aos="fade-left" data-aos-delay="500">
                  <div class="h-100">
                      <h6 class="section-title text-start service-text pe-3">Services</h6>
                      <h1 class="display-6 mb-4">#1 Pengiriman <span class="service-text">Antarpabrik</span> &  <span class="service-text">Antartoko</span></h1>
                      <p>Layanan pengiriman khusus antar lokasi pabrik atau fasilitas industri dalam satu jaringan bisnis. Kami menjamin pengiriman barang secara aman, tepat waktu, dan sesuai standar industri untuk mendukung kelancaran rantai pasok dan produksi Anda.</p>
                      <p class="mb-4"> Tidak hanya itu, layanan ini juga mencakup pengiriman antar toko berskala besar, seperti toko bangunan, toko tekstil, dan pusat distribusi lainnya, guna memastikan barang sampai dengan aman ke berbagai titik tujuan bisnis Anda.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Card 2 -->
  <div class="container-xxl py-5">
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-6" data-aos="fade-right" data-aos-delay="500">
                  <div class="h-100">
                      <h6 class="section-title text-start service-text pe-3">Services</h6>
                      <h1 class="display-6 mb-4">#2 Jasa <span class="service-text">Angkut Barang</span></h1>
                      <p>Angkutan berbagai jenis barang termasuk berat dan volume besar. Kami memiliki berbagai jenis armada mulai dari pickup hingga truk untuk memenuhi kebutuhan pengiriman skala kecil hingga besar.</p>
                      <p class="mb-4">Memberikan sebuah solusi yang cocok untuk kebutuhan individu, UMKM, maupun perusahaan besar.</p>
                  </div>
              </div>
              <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
                  <div class="img-border">
                      <img class="img-fluid" src="{{ asset('img/layanan2.jpg') }}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Card 3 -->
  <div class="container-xxl py-5">
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
                  <div class="img-border">
                      <img class="img-fluid" src="{{ asset('img/layanan33.jpg') }}" alt="">
                  </div>
              </div>
              <div class="col-lg-6" data-aos="fade-left" data-aos-delay="500">
                  <div class="h-100">
                      <h6 class="section-title text-start service-text pe-3">Services</h6>
                      <h1 class="display-6 mb-4">#3 <span class="service-text">Status</span> Pengiriman</h1>
                      <p>Pantau status pengiriman secara real-time melalui sistem kami untuk melihat perkembangan pengiriman logistik.</p>
                      <p class="mb-4">Dengan fitur pelacakan kami, Anda dapat mengetahui posisi kendaraan serta riwayat perjalanan pengiriman. Hal ini memberikan transparansi penuh dan rasa aman selama proses pengiriman berlangsung.</p>
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
        z-index: 1;
    }

    .hero-section-mini {
        height: 360px;
        background: linear-gradient(135deg, var(--bprimary) 0%,rgb(0, 0, 0) 100%);
        border-radius: 0 0 15px 15px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.9);
        margin-bottom: 20px;
        /* background: rgba(0, 0, 0, 0.6) url('/img/truck.jpg') center/cover no-repeat; 
        background-blend-mode: darken; */
        z-index: 1;
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
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }

    .img-border {
      position: relative;
      height: 100%;
      min-height: 400px;
    }

    .img-border::before {
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        right: 3rem;
        bottom: 3rem;
        border: 5px solid var(--rprimary);
        border: 5px solid var(--bprimary);
        border-radius: 15px;
    }

    .img-border img {
        position: absolute;
        top: 3rem;
        left: 3rem;
        width: calc(100% - 3rem);
        height: calc(100% - 3rem);
        object-fit: cover;
        border-radius: 15px;
    }

    .service-text {
        color: var(--rprimary);
    }
</style>
@endpush


@push('scripts')
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