<section>
    @php
        $tersimpan = empty($user->alamat1) || empty($user->telepon) || empty($user->kontak) || empty($user->kota);
    @endphp

    @if (session('status') === 'profile-updated' && !$tersimpan)
        <div class="mt-4 mb-6 p-4 rounded-md bg-green-100 text-green-800 border border-green-300">
            <strong>Selamat!</strong> Data profil berhasil diperbarui.
        </div>
    @endif

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Perbarui informasi akun profil dan alaman email Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- Nama --}}
        <div>
            <x-input-label for="name">
                {{ __('Nama') }} <span class="text-red-600">*</span>
            </x-input-label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email">
                {{ __('Email') }} <span class="text-red-600">*</span>
            </x-input-label>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Alamat email Anda tidak terverifikasi.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Klik disini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Tautan verifikasi yang baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Kontak / Nama Panggilan --}}
        <div>
            <x-input-label for="kontak">
                {{ __('Nama Kontak') }} <span class="text-red-600">*</span>
            </x-input-label>
            <x-text-input id="kontak" name="kontak" type="text" class="mt-1 block w-full"
                :value="old('kontak', $user->kontak)" autocomplete="nickname" required />
            <x-input-error class="mt-2" :messages="$errors->get('kontak')" />
        </div>

        {{-- Telepon --}}
        <div>
            <x-input-label for="telepon">
                {{ __('Telepon') }} <span class="text-red-600">*</span>
            </x-input-label>
            <x-text-input id="telepon" name="telepon" type="text" class="mt-1 block w-full"
                :value="old('telepon', $user->telepon)" autocomplete="tel" required />
            <x-input-error class="mt-2" :messages="$errors->get('telepon')" />
        </div>

        {{-- Fax --}}
        <div>
            <x-input-label for="fax" :value="__('Fax')" />
            <x-text-input id="fax" name="fax" type="text" class="mt-1 block w-full"
                :value="old('fax', $user->fax)" />
            <x-input-error class="mt-2" :messages="$errors->get('fax')" />
        </div>

        {{-- Alamat 1 --}}
        <div>
            <x-input-label for="alamat1">
                {{ __('Alamat Utama') }} <span class="text-red-600">*</span>
            </x-input-label>
            <x-text-input id="alamat1" name="alamat1" type="text" class="mt-1 block w-full"
                :value="old('alamat1', $user->alamat1)" autocomplete="street-address" required />
            <x-input-error class="mt-2" :messages="$errors->get('alamat1')" />
        </div>

        {{-- Alamat 2 --}}
        <div>
            <x-input-label for="alamat2" :value="__('Alamat Tambahan')" />
            <x-text-input id="alamat2" name="alamat2" type="text" class="mt-1 block w-full"
                :value="old('alamat2', $user->alamat2)" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat2')" />
        </div>

        {{-- Kota --}}
        <div>
            <x-input-label for="kota">
                {{ __('Kota') }} <span class="text-red-600">*</span>
            </x-input-label>
            <x-text-input id="kota" name="kota" type="text" class="mt-1 block w-full"
                :value="old('kota', $user->kota)" autocomplete="address-level2" required />
            <x-input-error class="mt-2" :messages="$errors->get('kota')" />
        </div>

        <x-input-label>
            <span class="text-red-600 italic">* Wajib Diisi</span>
        </x-input-label>
        
        {{-- Submit --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>