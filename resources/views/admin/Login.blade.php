<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #112D4E, #000000ff);
            min-height: 100vh;
        }

        .login-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 30px 25px;
            background-color: #fff;
        }

        .login-icon {
            width: 60px;
            height: 60px;
            background-color: #112D4E;
            color: #fff;
            border-radius: 50%;
            font-size: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .btn-dark {
            background-color: #112D4E;
        }
        
        .btn-dark:hover {
            background-color: #000000ff;
        }

        .form-label {
            font-weight: 600;
        }

        .alert-dismissible .btn-close {
            position: absolute;
            top: 12px;
            right: 12px;
        }

        #particles-login {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            opacity: 0.5;
        }

    </style>
</head>
<body>
    <div id="particles-login"></div>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh; z-index: 1; position: relative;">
        <div class="col-md-5">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show position-relative">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="login-card">
                <div class="login-icon">
                    <i class="bi bi-person"></i>
                </div>
                <h3 class="text-center mb-4 text-dark">Login ke Sistem Admin</h3>

                <form method="POST" action="/admin/login">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark w-100 mt-3">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (for dismissible alert) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Particle JS -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

    <script>
        particlesJS("particles-login", {
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
</body>
</html>
