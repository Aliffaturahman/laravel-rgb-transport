<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/customer-page.css') }}">

    <!-- CDN AOS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-xl navbar-dark px-5 py-3 py-lg-0">
        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('customer.index') }}">
            <img id="navbar-logo" src="{{ asset('img/logo/w-logo-2.png') }}" alt="RGB Transport">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a class="nav-item nav-link {{ Request::routeIs('customer.index') ? 'active' : '' }}" href="{{ route('customer.index') }}">Beranda</a>
                <a class="nav-item nav-link {{ Request::routeIs('customer.layanan') ? 'active' : '' }}" href="{{ route('customer.layanan') }}">Layanan</a>
                <a class="nav-item nav-link {{ Request::routeIs('customer.tentang') ? 'active' : '' }}" href="{{ route('customer.tentang') }}">Tentang</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Request::routeIs('customer.kontak') || Request::routeIs('customer.testimoni') ? 'active' : '' }}" data-bs-toggle="dropdown">Informasi</a>
                    <div class="dropdown-menu mt-1">
                        <a href="{{ route('customer.kontak') }}" class="dropdown-item"><i class="fas fa-address-card me-2"></i>Kontak</a>
                        <a href="{{ route('customer.testimoni') }}" class="dropdown-item">
                            <i class="fas fa-comments me-2"></i>Testimoni
                        </a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Request::routeIs('customer.pemesanan') || Request::routeIs('customer.tracking') ? 'active' : '' }}" data-bs-toggle="dropdown">Pengiriman</a>
                    <div class="dropdown-menu mt-1">
                            <a href="{{ route('customer.pemesanan') }}" class="dropdown-item">
                                <i class="fas fa-envelope me-2"></i>Pesan Sekarang
                            </a>
                            <a href="{{ route('customer.tracking') }}" class="dropdown-item">
                                <i class="fas fa-location-dot me-2"></i>Status Pengiriman
                            </a>
                    </div>
                </div>
            </div>
            @auth
                <div class="nav-item dropdown ms-lg-4 mt-3 mt-lg-0">
                    <a href="#" class="btn btn-login dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-user me-2"></i>{{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu mt-1">
                        <a href="{{ route('customer.dashboard') }}" class="dropdown-item">
                            <i class="fas fa-user-cog me-2"></i>Profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <div class="ms-lg-3 mt-3 mt-lg-0 ps-2">
                    <a href="{{ route('login') }}" class="btn btn-login">
                        <i class="fas fa-user me-2"></i>Login
                    </a>
                </div>
            @endguest
        </div>
    </nav>
    
    <!-- Main Content -->
    <main id="page-top">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer py-5 mt-0" style="position: relative; overflow: hidden;">
        <div id="particles-footer"></div>

        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="text-white mb-4 h3">RGB Transport</h5>
                    <p class="text-white-50">Solusi logistik terintegrasi untuk kebutuhan bisnis Anda dengan jaminan keamanan dan ketepatan waktu.</p>
                    <div class="social-icons mt-4">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h5 class="text-white mb-4 h4">Hubungi Kami</h5>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2 text-white"></i> Jl. Kerkof No.47, Leuwigajah</li>
                        <li class="mb-2"><i class="fas fa-phone-alt me-2 text-white"></i> +62812345678</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2 text-white"></i> rgbTransport@gmail.com</li>
                        <li><i class="fas fa-clock me-2 text-white"></i> Senin-Jumat: 09.00-17.00</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-white mb-4 h4">Pemesanan</h5>
                    <ul class="list-unstyled link-animated">
                        <li class="mb-2"><a href="{{ route('customer.pemesanan') }}" class="text-white"><i class="fas fa-chevron-right me-2"></i>Pesan Sekarang</a></li>
                        <li><a href="{{ route('customer.tracking') }}" class="text-white"><i class="fas fa-chevron-right me-2"></i>Status Pengiriman</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-white mb-4 h4">Perusahaan</h5>
                    <ul class="list-unstyled link-animated">
                        <li class="mb-2"><a href="{{ route('customer.index') }}" class="text-white"><i class="fas fa-chevron-right me-2"></i>Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('customer.layanan') }}" class="text-white"><i class="fas fa-chevron-right me-2"></i>Layanan</a></li>
                        <li class="mb-2"><a href="{{ route('customer.tentang') }}" class="text-white"><i class="fas fa-chevron-right me-2"></i>Tentang</a></li>
                        <li class="mb-2"><a href="{{ route('customer.kontak') }}" class="text-white"><i class="fas fa-chevron-right me-2"></i>Kontak</a></li>
                        <li><a href="{{ route('customer.testimoni') }}" class="text-white"><i class="fas fa-chevron-right me-2"></i>Testimoni</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="row align-items-center">
                <div class="col-md-12 text-center text-md-start">
                    <p class="mb-0 text-white-50">&copy; 2025 PT. RGB Transport. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top -->
    <a href="#page-top" class="btn btn-lg btn-scroll back-to-top">
        <i class="fa fa-angle-double-up"></i>
    </a>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- CDN JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <!-- Particle JS -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

    <script>
        $(function () {
    function setNavbarLogo() {
        let $btnLogin = $('.btn-login');

        function updateScrollStyles() {
            if ($(this).scrollTop() > 40) {
                $('.navbar').addClass('sticky-top shadow-sm');
                $btnLogin.removeClass('btn-login-default').addClass('btn-login');

                if ($(window).width() < 600) {
                    $('#navbar-logo').attr('src', "{{ asset('img/logo/bl-car.png') }}");
                } else {
                    $('#navbar-logo').attr('src', "{{ asset('img/logo/bl-logo-2.png') }}");
                }
            } else {
                $('.navbar').removeClass('sticky-top shadow-sm');
                $btnLogin.removeClass('btn-login').addClass('btn-login-default');

                if ($(window).width() < 600) {
                    $('#navbar-logo').attr('src', "{{ asset('img/logo/w-car.png') }}");
                } else {
                    $('#navbar-logo').attr('src', "{{ asset('img/logo/w-logo-2.png') }}");
                }
            }
        }

        updateScrollStyles();
        $(window).off('scroll.navbarLogo').on('scroll.navbarLogo', updateScrollStyles);
    }

    setNavbarLogo();
    $(window).resize(setNavbarLogo);
});


        // Back to top button
        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').fadeIn('slow');
            } else {
                $('.back-to-top').fadeOut('slow');
            }
        });
        $('.back-to-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 350, 'easeInOutExpo');
            return false;
        });
    </script>

    <script>
        particlesJS("particles-footer", {
            "particles": {
                "number": {
                    "value": 100,
                    "density": { "enable": true, "value_area": 800 }
                },
                "color": {
                    "value": ["#E84855"]
                },
                "shape": {
                    "type": "circle"
                },
                "opacity": {
                    "value": 0.9,
                    "random": true
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
                    "out_mode": "out"
                }
            },
            "interactivity": {
                "events": {
                    "onhover": { "enable": true, "mode": "repulse" }
                },
                "modes": {
                    "repulse": { "distance": 100 },
                    "push": { "particles_nb": 4 }
                }
            },
            "retina_detect": true
        });
    </script>
    
    @stack('scripts')
</body>
</html>