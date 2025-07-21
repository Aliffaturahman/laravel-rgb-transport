<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Petugas;
use App\Models\Pelanggan;
use App\Models\Kendaraan;

use App\Models\Pemesanan;
use App\Models\Riwayat;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(Request $request)
    {       
        $totalPemesanan = Pemesanan::count();
        $totalPetugas = Petugas::count();
        $totalPelanggan = Pelanggan::count();
        $totalKendaraan = Kendaraan::count();

        $riwayat = Riwayat::orderBy('waktu', 'desc')
            ->take(10)
            ->get();

        // Get raw delivery status counts
        $deliveryStats = Pemesanan::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // Prepare complete status data
        $statusLabels = [
            'Menunggu_Konfirmasi' => 'Menunggu Konfirmasi',
            'Diproses' => 'Diproses',
            'Dikirim' => 'Dikirim',
            'Selesai' => 'Selesai',
            'Dibatalkan' => 'Dibatalkan'
        ];

        // Ensure all statuses exist in the data
        foreach ($statusLabels as $key => $label) {
            if (!array_key_exists($key, $deliveryStats)) {
                $deliveryStats[$key] = 0;
            }
        }

        // Get monthly order data
        $monthlyOrders = Pemesanan::selectRaw('
            YEAR(created_at) as year, 
            MONTH(created_at) as month, 
            COUNT(*) as count
        ')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

        // Prepare chart data for last 12 months
        $monthlyChartData = [];
        $monthlyLabels = [];
        
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $year = $date->year;
            $month = $date->month;
            $monthName = $date->translatedFormat('M'); // 3-letter month name
            
            $found = $monthlyOrders->firstWhere(function ($item) use ($year, $month) {
                return $item->year == $year && $item->month == $month;
            });
            
            $monthlyLabels[] = $monthName . ' ' . $year;
            $monthlyChartData[] = $found ? $found->count : 0;
        }

        return view('admin.dashboard', compact(
            'totalPemesanan', 
            'totalPetugas', 
            'totalPelanggan', 
            'totalKendaraan', 
            'riwayat', 
            'deliveryStats', 
            'statusLabels',
            'monthlyLabels',
            'monthlyChartData'
        ));
    }
}