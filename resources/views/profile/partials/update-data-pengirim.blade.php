
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Data Pengirim') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Data ini akan otomatis terisi di halaman pemesanan sebagai informasi pengirim.") }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.pengirim.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- Nama Pengirim --}}
        <div>
            <x-input-label for="pengirim_nama" value="Nama Pengirim" />
            <x-text-input id="pengirim_nama" name="pengirim_nama" type="text" class="mt-1 block w-full"
                :value="old('pengirim_nama', $user->pengirim_nama)" required autocomplete="pengirim_nama" />
            <x-input-error class="mt-2" :messages="$errors->get('pengirim_nama')" />
        </div>

        {{-- Telepon Pengirim --}}
        <div>
            <x-input-label for="pengirim_telepon" value="Nomor Telepon / Whatsapp" />
            <x-text-input id="pengirim_telepon" name="pengirim_telepon" type="text" class="mt-1 block w-full"
                :value="old('pengirim_telepon', $user->pengirim_telepon)" required autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('pengirim_telepon')" />
        </div>

        {{-- Nama Tempat --}}
        <div>
            <x-input-label for="pengirim_nama_tempat" value="Nama Tempat / Bangunan" />
            <x-text-input id="pengirim_nama_tempat" name="pengirim_nama_tempat" type="text" class="mt-1 block w-full"
                :value="old('pengirim_nama_tempat', $user->pengirim_nama_tempat)" autocomplete="organization" :placeholder="'Contoh: Pabrik AB, Toko AB, Lapangan A, Rumah'"/>
            <x-input-error class="mt-2" :messages="$errors->get('pengirim_nama_tempat')" />
        </div>

        {{-- Alamat Pengirim --}}
        <div>
            <x-input-label for="pengirim_alamat" value="Alamat Lengkap" />
            <textarea id="pengirim_alamat" name="pengirim_alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('pengirim_alamat', $user->pengirim_alamat) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('pengirim_alamat')" />
        </div>

        {{-- Kota --}}
        <div>
            <x-input-label for="pengirim_kota" value="Kota" />
            <x-text-input id="pengirim_kota" name="pengirim_kota" type="text" class="mt-1 block w-full"
                :value="old('pengirim_kota', $user->pengirim_kota)" required />
            <x-input-error class="mt-2" :messages="$errors->get('pengirim_kota')" />
        </div>

        {{-- Provinsi --}}
        <div>
            <x-input-label for="pengirim_provinsi" value="Provinsi" />
            <x-text-input id="pengirim_provinsi" name="pengirim_provinsi" type="text" class="mt-1 block w-full"
                :value="old('pengirim_provinsi', $user->pengirim_provinsi)" />
            <x-input-error class="mt-2" :messages="$errors->get('pengirim_provinsi')" />
        </div>

        {{-- Kode Pos --}}
        <div>
            <x-input-label for="pengirim_kode_pos" value="Kode Pos" />
            <x-text-input id="pengirim_kode_pos" name="pengirim_kode_pos" type="text" class="mt-1 block w-full"
                :value="old('pengirim_kode_pos', $user->pengirim_kode_pos)"/>
            <x-input-error class="mt-2" :messages="$errors->get('pengirim_kode_pos')" />
        </div>

        {{-- Tombol Simpan --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan Data Pengirim') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600">
                    {{ __('Tersimpan.') }}
                </p>
            @endif
        </div>
    </form>
</section>
