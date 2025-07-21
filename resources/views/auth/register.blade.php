<x-guest-layout>
    <style>
        .bg-gray-100 {
            background: linear-gradient(135deg, #112D4E 0%,rgb(0, 0, 0) 100%) !important;
        }

        #particles-login {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 0;
            opacity: 0.8;
        }

        .login-wrapper {
            position: relative;
            z-index: 10;
            min-height: 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: transparent;
            width: 100%;
        }

        .login-box {
            background-color: white;
            padding: 2rem;
            border-radius: 0.75rem;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
    </style>

    <div id="particles-login"></div>
    <div class="login-wrapper">
        <!-- Logo di atas form -->
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo/w-logo-1.png') }}" alt="RGB Transport" class="w-72 mb-6 hover:opacity-70 transition-all duration-200">
        </a>

        <div class="login-box">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Sudah memiliki akun?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

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
</x-guest-layout>
