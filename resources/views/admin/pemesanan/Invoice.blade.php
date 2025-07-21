<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $pemesanan->nomor_pemesanan }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-header { border-bottom: 2px solid #333; padding-bottom: 20px; margin-bottom: 20px; }
        .logo { max-height: 80px; }
        .invoice-info { margin-top: 20px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        .text-right { text-align: right; }
        .total-box { background-color: #f5f5f5; padding: 15px; margin-top: 20px; }

        @media print {
            .no-print {
                display: none !important;
            }
            
            body {
                padding: 20px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <table width="100%">
            <tr>
                <td width="50%">
                    <img src="{{ public_path('img/logo/w-logo.png') }}" class="logo" alt="RGB Transport">
                    <h2>RGB Transport</h2>
                    <p>Jl. Contoh No. 123, Kota Bandung<br>
                    Telp: (022) 1234567<br>
                    Email: info@rgbtransport.com</p>
                </td>
                <td width="50%" class="text-right">
                    <h1>INVOICE</h1>
                    <p><strong>No. Invoice:</strong> {{ $pemesanan->nomor_pemesanan }}<br>
                    <strong>Tanggal:</strong> {{ $pemesanan->created_at->format('d/m/Y') }}</p>
                </td>
            </tr>
        </table>
    </div>

    <div class="invoice-info">
        <table width="100%">
            <tr>
                <td width="50%">
                    <h3>Pengirim:</h3>
                    <p>{{ $pemesanan->nama_pengirim }}<br>
                    {{ $pemesanan->alamat_pengirim }}<br>
                    Telp: {{ $pemesanan->telepon_pengirim }}</p>
                </td>
                <td width="50%">
                    <h3>Penerima:</h3>
                    <p>{{ $pemesanan->nama_penerima }}<br>
                    {{ $pemesanan->alamat_penerima }}<br>
                    Telp: {{ $pemesanan->telepon_penerima }}</p>
                </td>
            </tr>
        </table>
    </div>

    <h3 class="section-title">Detail Pengiriman</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Jenis Barang</th>
                <th>Berat</th>
                <th>Dimensi</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemesanan->barang as $barang)
            <tr>
                <td>{{ $barang->jenis_barang }}</td>
                <td>{{ $barang->berat }}</td>
                <td>{{ $barang->dimensi ?? '-' }}</td>
                <td>{{ $barang->catatan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-box">
        <table width="100%">
            <tr>
                <td width="80%"><strong>TOTAL</strong></td>
                <td width="20%" class="text-right">
                    <strong>Rp {{ number_format($pemesanan->biaya, 0, ',', '.') }}</strong>
                </td>
            </tr>
        </table>
    </div>

    <div style="margin-top: 100px;">
        <table width="100%">
            <tr>
                <td width="50%" style="text-align: center;">
                    <p>Hormat kami,</p>
                    <br><br><br>
                    <p>_________________________</p>
                    <p>RGB Transport</p>
                </td>
                <td width="50%" style="text-align: center;">
                    <p>Penerima,</p>
                    <br><br><br>
                    <p>_________________________</p>
                    <p>{{ $pemesanan->nama_penerima }}</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>