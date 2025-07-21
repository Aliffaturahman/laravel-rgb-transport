<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Tabel Alamat Penerima -->
            <div class="bg-white p-7 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-blue-900 border-opacity-20">
                    <h3 class="text-lg font-semibold text-gray-800">
                        <i class="fas fa-address-book text-blue-900 mr-2"></i>Daftar Penerima
                    </h3>
                </div>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                    </div>
                @endif

                @if ($dataPenerima->count())
                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-sm text-left text-gray-700 border border-gray-200 rounded-md" id="tabelPenerima">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Tempat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kota</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Provinsi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Pos</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($dataPenerima as $index => $alamat)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $alamat->nama }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $alamat->telepon }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $alamat->nama_tempat }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $alamat->alamat }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $alamat->kota }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $alamat->provinsi }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $alamat->kode_pos }}</td>
                                <td class="px-6 py-4 text-center text-sm font-medium">
                                    <button onclick="bukaModalEdit({{ $alamat->id }}, '{{ $alamat->nama }}', '{{ $alamat->nama_tempat }}', '{{ $alamat->telepon }}', `{{ $alamat->alamat }}`, '{{ $alamat->kota }}', '{{ $alamat->provinsi }}', '{{ $alamat->kode_pos }}')"
                                        class="text-blue-900 hover:text-blue-500 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('customer.alamat-penerima.destroy', $alamat->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus alamat ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-8">
                    <i class="fas fa-address-card text-4xl text-gray-400 mb-3"></i>
                    <p class="text-gray-500">Belum ada data alamat penerima.</p>
                </div>
                @endif
            </div>

            <!-- Riwayat Pemesanan -->
            <div class="bg-white p-6 rounded-lg shadow-md mt-8">
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-blue-900 border-opacity-20">
                    <h3 class="text-lg font-semibold text-gray-800">
                        <i class="fas fa-history text-blue-900 mr-2"></i>Riwayat Pemesanan
                    </h3>
                    <div class="flex items-center space-x-2">
                        <form method="GET" class="flex items-center space-x-2">
                            <div class="flex items-center">
                                <label class="text-xs text-gray-600 mr-2">Status:</label>
                                <select name="status" onchange="this.form.submit()" class="text-xs border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="semua" {{ ($status ?? 'semua') == 'semua' ? 'selected' : '' }}>Semua</option>
                                    <option value="diproses" {{ ($status ?? '') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="dikirim" {{ ($status ?? '') == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="selesai" {{ ($status ?? '') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ ($status ?? '') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                @if($riwayat_pemesanan->count() > 0)
                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-sm text-left text-gray-700 border border-gray-200 rounded-md" id="tabelPemesanan">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengirim</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penerima</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($riwayat_pemesanan as $index => $p)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $p->nomor_pemesanan }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    <div><span class="font-semibold">{{ $p->nama_pengirim }}</span></div>
                                    <div class="text-xs text-gray-500">{{ $p->alamat_pengirim }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    <div><span class="font-semibold">{{ $p->nama_penerima }}</span></div>
                                    <div class="text-xs text-gray-500">{{ $p->alamat_penerima }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $status = strtolower($p->status);
                                        $badgeColor = match($status) {
                                            'diproses' => 'bg-yellow-300 text-yellow-800',
                                            'dikirim' => 'bg-blue-300 text-blue-800',
                                            'selesai' => 'bg-green-300 text-green-800',
                                            'dibatalkan' => 'bg-red-300 text-red-800',
                                            default => 'bg-gray-300 text-gray-800'
                                        };
                                    @endphp
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $badgeColor }}">
                                        {{ ucfirst($p->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $p->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('customer.pemesanan.detail', $p->id) }}" class="btn text-blue-900 mb-0 me-2" data-toggle="tooltip" data-original-title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-8">
                    <i class="fas fa-folder-open text-4xl text-gray-400 mb-3"></i>
                    <p class="text-gray-500">Belum ada riwayat pemesanan.</p>
                </div>
                @endif
            </div>

        </div>
    </div>

    <!-- Modal Edit Alamat -->
    <div id="modalEdit" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Edit Alamat Penerima</h2>
                <button onclick="tutupModalEdit()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="formEdit" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" id="editId">

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="nama" id="editNama" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">NamaTempat</label>
                    <input type="text" name="nama_tempat" id="editNamaTempat" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                    <input type="text" name="telepon" id="editTelepon" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea name="alamat" id="editAlamat" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                
                <!-- Kota -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kota</label>
                    <input type="text" name="kota" id="editKota" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Provinsi -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Provinsi</label>
                    <input type="text" name="provinsi" id="editProvinsi" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Kode Pos -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kode Pos</label>
                    <input type="text" name="kode_pos" id="editKodePos" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>


                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="tutupModalEdit()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    function bukaModalEdit(id, nama, nama_tempat, telepon, alamat, kota, provinsi, kode_pos) {
        document.getElementById('editId').value = id;
        document.getElementById('editNama').value = nama;
        document.getElementById('editNamaTempat').value = nama_tempat;
        document.getElementById('editTelepon').value = telepon;
        document.getElementById('editAlamat').value = alamat;
        document.getElementById('editKota').value = kota;
        document.getElementById('editProvinsi').value = provinsi;
        document.getElementById('editKodePos').value = kode_pos;

        document.getElementById('formEdit').action = '/customer/alamat-penerima/' + id;
        document.getElementById('modalEdit').classList.remove('hidden');
    }

    function tutupModalEdit() {
        document.getElementById('modalEdit').classList.add('hidden');
    }
</script>

<script>
    $(document).ready(function() {
        $('#tabelPenerima').DataTable({
            responsive: true,
            pageLength: 5,
            lengthMenu: [5, 10, 20, 50, 100],
            dom: "<'flex flex-col md:flex-row justify-between items-center mb-5'l f>rt<'flex flex-col md:flex-row justify-between items-center mt-3'ip>",
            language: {
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Tidak ada data ditemukan",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                search: "Cari:",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            },
            drawCallback: function() {
                $('#tabelPenerima_length select').addClass('border border-gray-300 w-16 rounded-md text-sm shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400 px-2 py-1 mr-2 bg-[#112D4E] text-white');
                $('#tabelPenerima_filter input').addClass('border border-gray-300 rounded-md text-sm shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400 px-2 py-1 ml-2 bg-[#112D4E] text-white placeholder-gray-200');
                $('#tabelPenerima_info').addClass('text-sm text-gray-600 mt-0');
                
                $('#tabelPenerima_paginate a').addClass('px-3 py-1 border rounded-md text-sm border-gray-300 text-white bg-[#112D4E] hover:bg-blue-600 hover:text-white');
                $('#tabelPenerima_paginate .current').removeClass('bg-[#112D4E]').addClass('bg-blue-600 text-white border-blue-600');
            }
        });

        $('#tabelPemesanan').DataTable({
            responsive: true,
            pageLength: 5,
            lengthMenu: [5, 10, 20, 50, 100],
            dom: "<'flex flex-col md:flex-row justify-between items-center mb-5'l f>rt<'flex flex-col md:flex-row justify-between items-center mt-3'ip>",
            language: {
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Tidak ada data ditemukan",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                search: "Cari:",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            },
            drawCallback: function() {
                $('#tabelPemesanan_length select').addClass('border border-gray-300 w-16 rounded-md text-sm shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400 px-2 py-1 mr-2 bg-[#112D4E] text-white');
                $('#tabelPemesanan_filter input').addClass('border border-gray-300 rounded-md text-sm shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400 px-2 py-1 ml-2 bg-[#112D4E] text-white placeholder-gray-200');
                $('#tabelPemesanan_info').addClass('text-sm text-gray-600 mt-0');

                $('#tabelPemesanan_paginate a').addClass('px-3 py-1 border rounded-md text-sm border-gray-300 text-white bg-[#112D4E] hover:bg-blue-600 hover:text-white');
                $('#tabelPemesanan_paginate .current').removeClass('bg-[#112D4E]').addClass('bg-blue-600 text-white border-blue-600');
            }
        });
    });
</script>