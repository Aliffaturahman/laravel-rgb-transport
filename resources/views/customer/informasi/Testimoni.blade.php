@extends('customer.layout.main')

@section('title', 'Testimoni - RGB Transport')

@section('content')
<section class="hero-section-mini text-white py-5">
    <div id="particles-js" class="position-absolute top-0 start-0 w-100 h-50"></div>
        <div class="container text-center mt-5">
            <div class="row align-items-center pt-5 mt-5">
            <h1 class="display-4 fw-bold">Testimoni</h1>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-2" style="z-index: 1">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('customer.index') }}" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Testimoni</li>
                </ol>
            </nav>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card testimoni-card border-0">
                    <div class="card-body p-3">
                        <div class="contact-header pb-5">
                            <h2 class="contact-title">Berikan Testimoni Anda</h2>
                            <p class="contact-subtitle">Bagaimana tanggapan Anda setelah menggunakan layanan kami?</p>
                            <div class="divider mx-auto"></div>
                        </div>
                        <form action="{{ route('customer.testimoni.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group floating mb-5">
                                <input type="text" name="name" id="name" class="form-input" placeholder=" " value="{{ $user->name }}" readonly>
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <div class="underline"></div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-md-6">
                                    <div class="form-group floating">
                                        <input type="email" name="email" id="email" class="form-input" placeholder=" " value="{{ $user->email }}" readonly>
                                        <label for="email" class="form-label">Email</label>
                                        <div class="underline"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group floating">
                                        <input type="text" name="telepon" id="telepon" class="form-input" placeholder=" " value="{{ $user->telepon }}" readonly>
                                        <label for="telepon" class="form-label">Telepon</label>
                                        <div class="underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-5">
                                <label class="form-label-photo py-2">Foto Profil (Opsional)</label>
                                <input type="file" name="photo" id="photo" class="form-control gradient-shadow" accept="image/*">
                                <small class="text-muted">Ukuran maksimal: 2MB</small>
                            </div>
                            
                            <div class="form-group floating mb-4">
                                <textarea name="comment" id="comment" class="form-textarea" rows="2" placeholder=" " required></textarea>
                                <label for="comment" class="textarea-label">Testimoni Anda</label>
                                <div class="textarea-underline"></div>
                            </div>
                            
                            <div class="form-group mb-4">
                                <label class="form-label">Rating</label>
                                <div class="rating-input">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" required>
                                        <label for="star{{ $i }}" class="star-label" data-index="{{ $i }}"><i class="far fa-star"></i></label>
                                    @endfor
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <button type="submit" class="btn submit-btn btn-lg px-5">
                                    <i class="fas fa-paper-plane me-2"></i> Kirim Testimoni
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-2">
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mb-5">
              <h2 class="display-5 fw-bold" style="color: var(--bprimary);">Testimoni Pengiriman</h2>
              <p class="lead">Apa kata pelanggan setelah menggunakan jasa kami?</p>
              <div class="divider mx-auto"></div>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach($testimoni as $testi)
                  <div class="testimonial-item bg-light rounded ps-4 pt-4 pe-4 ms-2 me-2">
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
@endsection

@push('styles')
<style>
    /* ============================= HERO MINI ============================= */
    .breadcrumb-item + .breadcrumb-item::before {
        color: white;
        font-size: 1rem;
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

    #particles-js {
        z-index: 0;
        opacity: 0.5;
    }

    /* ============================= TESTIMONIAL FORM ============================= */
    /* Header */
    .contact-header {
        margin-bottom: 2rem;
        text-align: center;
    }

    .contact-title {
        font-size: 2rem;
        font-weight: 500;
        color: var(--bprimary);
        margin-bottom: 0.5rem;
        position: relative;
        display: inline-block;
    }

    .contact-subtitle {
        font-size: 1rem;
        margin-top: 0.5rem;
    }

    /* Form */
    .form-group {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .form-input {
        width: 100%;
        height: 35px;
        padding: 15px 10px;
        font-size: 1rem;
        border: none;
        border-bottom: 1px solid #ced4da;
        border-radius: 8px;
        background-color: transparent;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-bottom-color: transparent;
    }

    .form-label {
        position: absolute;
        top: 0.25rem;
        left: 0;
        color: #6c757d;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .form-input:focus + .form-label,
    .form-input:not(:placeholder-shown) + .form-label {
        transform: translateY(-28px) scale(1);
        color:var(--bprimary);
    }

    .underline {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(to right, var(--bprimary), var(--rprimary));
        transition: width 0.3s ease;
    }

    .form-input:focus ~ .underline {
        width: 100%;
    }

    .rating-input {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }

    .rating-input input[type="radio"] {
        display: none;
    }

    .rating-input .star-label {
        font-size: 2rem;
        margin: 0 5px;
        cursor: pointer;
        color: var(--bprimary);
        transition: color 0.2s;
    }

    /* Textarea Styles */
    .form-textarea {
        width: 100%;
        padding: 15px 10px;
        font-size: 1rem;
        border: none;
        border-bottom: 1px solid #ced4da;
        background-color: transparent;
        resize: none;
        transition: all 0.3s ease;
    }

    .form-textarea:focus {
        outline: none;
        border-bottom-color: transparent;
    }

    .textarea-label {
        position: absolute;
        top: 0.75rem;
        left: 0;
        color: #6c757d;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .form-textarea:focus + .textarea-label,
    .form-textarea:not(:placeholder-shown) + .textarea-label {
        transform: translateY(-28px);
        color: var(--bprimary);
    }

    .textarea-underline {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(to right, var(--bprimary), var(--rprimary));
        transition: width 0.3s ease;
    }

    .form-textarea:focus ~ .textarea-underline {
        width: 100%;
    }

    /* File Input */
    .form-label-photo {
        top: 0.25rem;
        left: 0;
        color: #6c757d;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .form-control[type="file"] {
        border: 1px solid #ced4da;
        border-radius: 5px;
    }

    .form-control[type="file"]:focus {
        box-shadow: none;
        border-bottom-color: transparent;
        box-shadow: 0 1px 1px var(--bprimary);
    }

    .form-control[type="file"].gradient-shadow {
        position: relative;
        z-index: 0;
        outline: none;
        border-bottom: 1px solid #ced4da; /* optional */
        background-color: white;
    }

    .form-control[type="file"].gradient-shadow:focus::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -3px;
        width: 100%;
        height: 5px;
        border-radius: 2px;
        background: linear-gradient(to right, var(--bprimary), var(--rprimary));
        z-index: -1;
    }

    /* Submit */
    .submit-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        padding: 0.875rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        color: white;
        background: linear-gradient(135deg, var(--bprimary) 0%, var(--rprimary) 100%);
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        margin-top: 1rem;
    }

    .submit-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: 0.5s;
    }

    .submit-btn:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.4);
    }

    .submit-btn:hover::before {
        left: 100%;
    }

    /* Card Styles */
    .card {
        overflow: hidden;
        border-radius: 15px;
    }

    .card-body {
        padding: 2.5rem;
        border-radius: 15px;
    }

    .testimoni-card {
        height: 100%;
        background: white;
        border-radius: 16px;
        box-shadow: 7px 7px 3px rgba(0, 0, 0, 1);
        overflow: hidden;
        padding: 2.5rem;
        transition: box-shadow 0.3s cubic-bezier(.4,2,.6,1);
    }

    .testimoni-card:hover {
        box-shadow: 10px 10px 10px rgb(85, 85, 85);
        transition-delay: 0.05s;
    }

    @keyframes move-dot {
        0%   { left: 0%; }
        100% { left: 100%; }
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

    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll('.rating-input .star-label');
        const radios = document.querySelectorAll('.rating-input input[type="radio"]');

        function updateStars(rating) {
            stars.forEach((label) => {
                const star = label.querySelector('i');
                const index = parseInt(label.getAttribute('data-index'));
                if (index <= rating) {
                    star.classList.remove('far');
                    star.classList.add('fas');
                    star.style.color = 'var(--bprimary)'; // Warna bintang terpilih
                } else {
                    star.classList.remove('fas');
                    star.classList.add('far');
                    star.style.color = 'var(--bprimary)'; // Warna bintang tidak terpilih
                }
            });
        }

        radios.forEach((radio) => {
            radio.addEventListener('change', function () {
                updateStars(parseInt(this.value));
            });
        });

        // Inisialisasi jika sudah ada nilai rating saat halaman dimuat
        const checked = document.querySelector('.rating-input input[type="radio"]:checked');
        if (checked) {
            updateStars(parseInt(checked.value));
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