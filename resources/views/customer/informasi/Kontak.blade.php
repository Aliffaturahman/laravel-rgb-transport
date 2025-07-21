@extends('customer.layout.main')

@section('title', 'Hubungi Kami - RGB Transport')

@section('content')
<section class="hero-section-mini text-white py-5">
    <div id="particles-js" class="position-absolute top-0 start-0 w-100 h-50"></div>
        <div class="container text-center mt-5">
            <div class="row align-items-center pt-5 mt-5">
            <h1 class="display-4 fw-bold">Kontak</h1>
            <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-2" style="z-index: 1">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('customer.index') }}" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Kontak</li>
                </ol>
            </nav>
            </div>
        </div>
    </div>
</section>

<section class="contact-info-section">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="contact-info-container">
        <!-- Contact Form Column -->
        <div class="contact-column">
            <div class="contact-card">
                <div class="contact-header">
                    <h2 class="contact-title">Hubungi Kami</h2>
                    <p class="contact-subtitle">Silakan isi form berikut untuk pertanyaan, kritik, atau saran kepada kami.</p>
                    <div class="divider mx-auto"></div>
                </div>
                
                <form class="contact-form" action="{{ route('customer.kontak.submit') }}" method="POST">
                @csrf
                    <div class="form-group floating mb-3">
                        <input type="text" id="name" name="name" class="form-input" placeholder=" " required>
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <div class="underline"></div>
                    </div>
                    
                    <div class="form-group floating mb-3">
                        <input type="email" id="email" name="email" class="form-input" placeholder=" " required>
                        <label for="email" class="form-label">Email</label>
                        <div class="underline"></div>
                    </div>
                    
                    <div class="form-group floating mb-4">
                        <input type="tel" id="phone" name="phone" class="form-input" placeholder=" ">
                        <label for="phone" class="form-label">No. Telepon</label>
                        <div class="underline"></div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label id="subjectLabel" class="form-label" style="display:none;">Subjek</label>
                        <div class="custom-dropdown" id="subjectDropdown">
                            <div class="dropdown-selected">Subjek</div>
                            <ul class="dropdown-options">
                                <li data-value="Pertanyaan">Pertanyaan</li>
                                <li data-value="Kritik">Kritik</li>
                                <li data-value="Saran">Saran</li>
                                <li data-value="Lainnya">Lainnya</li>
                                <li class="cancel-option" data-value="">Batal</li>
                            </ul>
                            <input type="hidden" name="subject" id="subjectInput">
                        </div>
                    </div>

                    <div class="form-group floating">
                        <textarea name="message" id="message" class="form-textarea" rows="4" placeholder=" " required></textarea>
                        <label for="message" class="textarea-label">Pesan</label>
                        <div class="textarea-underline"></div>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <span class="btn-text">Kirim</span>
                        <span class="fas fa-arrow-right"></span>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Info Column -->
        <div class="info-column">
            <div class="info-card">
                <div class="info-header">
                    <h2 class="info-title">Kantor Kami</h2>
                    <div class="title-decoration"></div>
                </div>
                
                <div class="info-content">
                    <!-- Address Card -->
                    <div class="info-item">
                        <div class="info-icon"><span class="fas fa-location-dot fa-lg"></span></div>
                        <div class="info-details">
                            <h3 class="info-label">Alamat</h3>
                            <p class="info-text">Jl. Kerkof, Leuwigajah, Kec. Cimahi Sel., Kota Cimahi, Jawa Barat 40532</p>
                        </div>
                    </div>
                    
                    <!-- Phone Card -->
                    <div class="info-item">
                        <div class="info-icon"><span class="fas fa-phone fa-lg"></span></div>
                        <div class="info-details">
                            <h3 class="info-label">Telepon</h3>
                            <p class="info-text">+62812345678</p>
                        </div>
                    </div>
                    
                    <!-- Email Card -->
                    <div class="info-item">
                        <div class="info-icon"><span class="far fa-envelope fa-lg"></span></div>
                        <div class="info-details">
                            <h3 class="info-label">Email</h3>
                            <p class="info-text">rgbTransport@gmail.com</p>
                        </div>
                    </div>
                    
                    <!-- Hours Card -->
                    <div class="info-item">
                        <div class="info-icon"><span class="far fa-clock fa-lg"></span></div>
                        <div class="info-details">
                            <h3 class="info-label">Jam Operasional</h3>
                            <p class="info-text">
                                <span class="hours-day">Senin - Jumat:</span> 09:00 - 17:00 WIB<br>
                                <span class="hours-day">Sabtu:</span> 09:00 - 14:00 WIB
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.879174642252!2d107.52321627483536!3d-6.9050491930942925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e509e4c2c06b%3A0xb2088e043f6ae459!2sRGB%20Transport!5e0!3m2!1sen!2sid!4v1751522185933!5m2!1sen!2sid" 
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map-iframe"></iframe>
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

    .btn-message {
        color: white;
        background-color: var(--bprimary);
        border-color: var(--bprimary);
    }

    .btn-message:hover {
        background-color: var(--rprimary);
        border-color: var(--rprimary);
    }

    /* Contact Us */
    /* Base Styles */
    .contact-info-section {
        padding: 4rem 2rem;
    }

    .contact-info-container {
        display: flex;
        max-width: 1400px;
        margin: 0 auto;
        gap: 2rem;
    }

    /* Columns */
    .contact-column, .info-column {
        flex: 1;
        min-width: 0;
    }

    /* Contact Card */
    .contact-card {
        height: 100%;
        background: white;
        border-radius: 16px;
        box-shadow: 7px 7px 3px rgba(0, 0, 0, 1);
        overflow: hidden;
        padding: 2.5rem;
        transition: box-shadow 0.3s cubic-bezier(.4,2,.6,1);
    }

    .contact-card:hover {
        box-shadow: 10px 10px 10px rgb(85, 85, 85);
        transition-delay: 0.05s;
    }

    .contact-header {
        margin-bottom: 2rem;
        text-align: center;
    }

    .contact-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--bprimary);
        margin-bottom: 0.5rem;
        position: relative;
        display: inline-block;
    }

    .contact-subtitle {
        font-size: 1rem;
        margin-top: 0.5rem;
    }
    
    .divider {
        position: relative;
        width: 120px;
        height: 4px;
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
        /* animation: move-dot 3s infinite ease-in-out; */
    }

    @keyframes move-dot {
        0%   { left: 0%; }
        /* 50%  { left: 50%; } */
        100% { left: 100%; }
    }

    /* Form Styles */
    .contact-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .form-group {
        position: relative;
    }

    /* Floating Label Inputs */
    .floating {
        position: relative;
        padding-top: 1rem;
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

    .form-input:focus + .form-label,
    .form-input:not(:placeholder-shown) + .form-label {
        transform: translateY(-28px) scale(1);
        color:var(--bprimary);
    }

    .form-label {
        position: absolute;
        top: 1rem;
        left: 0;
        color: #6c757d;
        pointer-events: none;
        transition: all 0.3s ease;
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

    /* Custom Dropdown */
    .custom-dropdown {
        position: relative;
        width: 100%;
        user-select: none;
        font-size: 1rem;
        padding: 0.75rem 0;
        color: #6c757d;
        background: transparent;
        cursor: pointer;
        border-bottom: 1px solid #ced4da;
    }

    .custom-dropdown.selected {
        padding: 0.75rem 0;
        padding-left: 0.55rem;
        color: black;
    }

    .custom-dropdown::after {
        background: linear-gradient(to right, var(--bprimary), var(--rprimary));
    }

    .dropdown-selected::after {
        content: '▾';
        float: right;
        font-size: 1.5rem;
        transition: transform 0.3s ease;
    }

    .custom-dropdown.open .dropdown-selected::after {
        transform: rotate(180deg);
    }

    .dropdown-options {
        list-style: none;
        padding-left: 0;
        margin: 0;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        display: none;
        z-index: 1000;
    }

    .custom-dropdown.open .dropdown-options {
        display: block;
    }

    .dropdown-options li {
        padding: 10px 16px;   
        cursor: pointer;
        border-radius: 7px;
        color: var(--bprimary);
        transition: background 0.2s ease;
    }

    .dropdown-options li:hover {
        color: white;
        background: var(--bprimary);
    }

    #subjectLabel {
        margin: -35px 0px;
        color: var(--bprimary);
        transition: color 0.3s;
    }

    .cancel-option {
        color: var(--rprimary) !important;
        font-weight: 700;
    }

    .cancel-option:hover {
        background: var(--rprimary) !important;
        color: white !important;
    }

    /* Textarea Styles */
    .form-textarea {
        width: 100%;
        padding: 0 10px;
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

    /* Submit Button */
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
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.4);
    }

    .submit-btn:hover::before {
        left: 100%;
    }

    .btn-icon {
        transition: transform 0.3s ease;
    }

    .submit-btn:hover .btn-icon {
        transform: translateX(3px);
    }

    /* Info Card */
    .info-card {
        height: 100%;
        background: white;
        border-radius: 16px;
        box-shadow: 7px 7px 3px rgba(0, 0, 0, 1);
        overflow: hidden;
        padding: 2.5rem;
        transition: box-shadow 0.3s cubic-bezier(.4,2,.6,1);
    }

    .info-card:hover {
        box-shadow: 10px 10px 10px rgb(85, 85, 85);
        transition-delay: 0.05s; /* delay 0.2 detik sebelum animasi box-shadow */
    }

    /* Header Styles */
    .info-header {
        margin-bottom: 2rem;
        position: relative;
    }

    .info-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2b2d42;
        margin-bottom: 1.5rem;
        position: relative;
        display: inline-block;
    }

    .title-decoration {
        position: absolute;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--bprimary), var(--rprimary));
        bottom: -10px;
        left: 0;
        border-radius: 2px;
    }

    /* Info Items */
    .info-content {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
        padding: 1.25rem;
        border-radius: 12px;
        background: #f8f9fa;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: default;
    }

    .info-item:hover {
        background: #f1f3f5;
        transform: translateX(5px);
    }

    .info-icon {
        flex-shrink: 0;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        color: white;
        
        background: linear-gradient(to right, var(--bprimary), var(--rprimary));
        background-size: 500% 500%;
        background-position: left;
        transition: background-position 0.5s ease;
    }

    .info-item:hover .info-icon {
        background-position: right;
    }

    .info-icon svg {
        width: 24px;
        height: 24px;
        fill: currentColor;
    }

    .info-details {
        flex-grow: 1;
    }

    .info-label {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2b2d42;
        margin-bottom: 0.5rem;
    }

    .info-text {
        color: #495057;
        line-height: 1.6;
        margin: 0;
    }

    .hours-day {
        font-weight: 500;
        color: #2b2d42;
    }

    /* Map Styles */
    .map-container {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        height: 300px;
    }

    .map-iframe {
        width: 100%;
        height: 100%;
        border: none;
        filter: grayscale(20%) contrast(1.1);
        transition: filter 0.3s ease;
    }

    .map-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        padding-bottom: 1.5rem;
        z-index: 1;
        pointer-events: none;
    }

    .map-container:hover .map-iframe {
        filter: grayscale(0%) contrast(1);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .contact-info-container {
            flex-direction: column;
        }
        
        .contact-column, .info-column {
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .contact-info-section {
            padding: 2rem 1rem;
        }
        
        .contact-card, .info-card {
            padding: 1.5rem;
        }
        
        .contact-title, .info-title {
            font-size: 1.75rem;
        }
        
        .info-item {
            flex-direction: column;
            gap: 1rem;
        }
        
        .map-container {
            height: 250px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const dropdown = document.getElementById('subjectDropdown');
    const selected = dropdown.querySelector('.dropdown-selected');
    const options = dropdown.querySelectorAll('.dropdown-options li');
    const hiddenInput = dropdown.querySelector('input[type="hidden"]');
    const label = document.getElementById('subjectLabel');

    selected.addEventListener('click', () => {
        dropdown.classList.toggle('open');
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            const value = option.getAttribute('data-value');
            const text = option.textContent;
            
            if (value === "") {
                // Jika memilih Batal
                selected.textContent = "Subjek";
                hiddenInput.value = "";
                dropdown.classList.remove('selected');
                label.style.display = 'none';
            } else {
                // Jika memilih opsi lain
                selected.textContent = text;
                hiddenInput.value = value;
                dropdown.classList.add('selected');
                label.style.display = 'block';
            }
            
            dropdown.classList.remove('open');
        });
    });

    document.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target)) {
            dropdown.classList.remove('open');
        }
    });
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