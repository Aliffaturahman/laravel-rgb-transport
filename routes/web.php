<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

// ================== ADMIN ==================
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatController;

// Controllers for Setup Data
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\HargaAngkutController;
use App\Http\Controllers\KendaraanController;

// Controllers for Transaksi
use App\Http\Controllers\SuratMuatController;
use App\Http\Controllers\PenerimaanBarangController;

use App\Http\Controllers\DataPenerimaController;
use App\Http\Controllers\PemesananController;

// Controllers for Lainnya
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\PesanController;


// ================== CUSTOMER ==================
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TrackingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ==================================== ADMIN ==================================== //
// Login Admin Route
Route::get('/admin/login', [LoginController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::middleware('admin.auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    // --- Dashboard ---//
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard/delivery-stats', [DashboardController::class, 'deliveryStats']);
    Route::get('/admin/dashboard/monthly-stats', [DashboardController::class, 'monthlyStats']);
    

    // --- Setup Data ---//
    // GET
    Route::get('/data/addData/petugas', [PetugasController::class, 'form'])->name('data.addData.petugas');
    Route::get('/data/addData/pelanggan', [PelangganController::class, 'form'])->name('data.addData.pelanggan');
    Route::get('/data/addData/hargaAngkut', [HargaAngkutController::class, 'form'])->name('data.addData.hargaAngkut');
    Route::get('/data/addData/kendaraan', [KendaraanController::class, 'form'])->name('data.addData.kendaraan');

    Route::get('/data/petugas', [PetugasController::class, 'table'])->name('data.petugas');
    Route::get('/data/pelanggan', [PelangganController::class, 'table'])->name('data.pelanggan');
    Route::get('/data/hargaAngkut', [HargaAngkutController::class, 'table'])->name('data.hargaAngkut');
    Route::get('/data/kendaraan', [KendaraanController::class, 'table'])->name('data.kendaraan');
    Route::get('/data/riwayat', [RiwayatController::class, 'table'])->name('data.riwayat');

    // ADD
    Route::post('/data/addData/petugas', [PetugasController::class, 'add'])->name('data.addData.petugas');
    Route::post('/data/addData/pelanggan', [PelangganController::class, 'add'])->name('data.addData.pelanggan');
    Route::post('/data/addData/hargaAngkut', [HargaAngkutController::class, 'add'])->name('data.addData.hargaAngkut');
    Route::post('/data/addData/kendaraan', [KendaraanController::class, 'add'])->name('data.addData.kendaraan');

    // UPDATE
    Route::put('/data/petugas/{id}', [PetugasController::class, 'update'])->name('data.petugas.update');
    Route::put('/data/pelanggan/{id}', [PelangganController::class, 'update'])->name('data.pelanggan.update');
    Route::put('/data/hargaAngkut/{id}', [HargaAngkutController::class, 'update'])->name('data.hargaAngkut.update');
    Route::put('/data/kendaraan/{id}', [KendaraanController::class, 'update'])->name('data.kendaraan.update');

    // DELETE
    Route::delete('/petugas/{id}', [PetugasController::class, 'delete'])->name('petugas.delete');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'delete'])->name('pelanggan.delete');
    Route::delete('/hargaAngkut/{id}', [HargaAngkutController::class, 'delete'])->name('hargaAngkut.delete');
    Route::delete('/kendaraan/{id}', [KendaraanController::class, 'delete'])->name('kendaraan.delete');

    // --- Orderan ---//
    // Daftar Pemesanan
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
    Route::get('/pemesanan/{id}', [PemesananController::class, 'detail'])->name('pemesanan.detail');
    Route::put('/pemesanan/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
    Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');

    Route::get('/pemesanan/{id}/invoice', [PemesananController::class, 'invoice'])
        ->name('pemesanan.invoice');

    // Tracking
    Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking.index');
    Route::post('/tracking', [TrackingController::class, 'store'])->name('tracking.store');
    Route::delete('/tracking/{id}', [TrackingController::class, 'destroy'])->name('tracking.destroy');

    // --- Lainnya --- //
    // Pesan
    Route::get('/pesan', [PesanController::class, 'index'])->name('pesan.index');
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('pesan.delete');

    // Testimoni Routes
    Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
    Route::put('/testimoni/{id}/toggle', [TestimoniController::class, 'toggleStatus'])->name('testimoni.toggle');
    Route::delete('/testimoni/{id}', [TestimoniController::class, 'destroy'])->name('testimoni.delete');
});

// ==================================== CUSTOMER ==================================== //
// Home Customer
Route::get('/', [CustomerController::class, 'index'])->name('customer.index');

// Login Admin Customer
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/pengirim', [ProfileController::class, 'editPengirim'])->name('profile.pengirim.edit');
    Route::patch('/profile/pengirim', [ProfileController::class, 'updatePengirim'])->name('profile.pengirim.update');
    
    Route::get('/customer/pemesanan/{id}', [ProfileController::class, 'detail'])->name('customer.pemesanan.detail');
});

// Customer Routes
Route::prefix('customer')->name('customer.')->group(function() {

    // Perusahaan
    Route::get('/', [CustomerController::class, 'index'])->name('index');
    Route::get('/layanan', [CustomerController::class, 'layanan'])->name('layanan');
    Route::get('/tentang', [CustomerController::class, 'tentang'])->name('tentang');

    // Informasi
    Route::get('/informasi/kontak', [CustomerController::class, 'kontak'])->name('kontak');
    Route::post('/informasi/kontak', [CustomerController::class, 'submitKontak'])->name('kontak.submit');

    // Route yang butuh login
    Route::middleware('customer.auth')->group(function () {
        // Home Customer Login
        Route::get('/dashboard', [ProfileController::class, 'index'])->middleware('verified')->name('dashboard');

        // Testimoni
        Route::get('/informasi/testimoni', [CustomerController::class, 'testimoni'])->name('testimoni');
        Route::post('/informasi/testimoni/store', [CustomerController::class, 'store'])->name('testimoni.store');

        // Form Pemesanan
        Route::get('/pengiriman/pemesanan', [CustomerController::class, 'pemesanan'])->name('pemesanan');
        Route::post('/pengiriman/pemesanan/submit', [CustomerController::class, 'submitPesanan'])->name('pemesanan.submit');
        Route::get('/pengiriman/pemesanan/berhasil/{id}', [CustomerController::class, 'pemesanan_berhasil'])->name('pemesanan_berhasil');

        // Alamat Penerima
        Route::get('/alamat-penerima/{id}/edit', [DataPenerimaController::class, 'edit'])->name('alamat-penerima.edit');
        Route::put('/alamat-penerima/{id}', [DataPenerimaController::class, 'update'])->name('alamat-penerima.update');
        Route::delete('/alamat-penerima/{id}', [DataPenerimaController::class, 'destroy'])->name('alamat-penerima.destroy');

        // Tracking Pengiriman
        Route::get('/pengiriman/tracking', [TrackingController::class, 'tracking'])->name('tracking');
        Route::get('/pengiriman/tracking/search', [TrackingController::class, 'search'])->name('tracking.search');
    });

    // Halaman penjelasan login
    Route::get('/login-info', function () {
        return view('customer.login_info');
    })->name('login-info');
});

require __DIR__.'/auth.php';