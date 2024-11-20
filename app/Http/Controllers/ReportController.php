<?php

namespace App\Http\Controllers;

use App\Models\Rekaplaporan;
use App\Models\Pembelian;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function rekap()
    {
        // Ambil data rekap bulanan dari model Pembelian
        $rekapLaporan = Pembelian::selectRaw('MONTH(created_at) as bulan, SUM(sub_total) as total_pendapatan, SUM(harga_beli) as total_biaya_pembelian')->groupBy('bulan')->orderBy('bulan')->get();

        // Ambil total biaya dan biaya penjualan per bulan dari model Transactions
        $totalBiayaPerBulan = Transactions::selectRaw('MONTH(created_at) as bulan, SUM(sub_total) as total_biaya, SUM(harga_jual) as total_biaya_penjualan')->groupBy('bulan')->orderBy('bulan')->get()->keyBy('bulan'); // Memudahkan pencocokan dengan bulan dari Pembelian

        // Integrasikan biaya dari Transactions ke dalam rekap laporan
        $rekapLaporan->transform(function ($item) use ($totalBiayaPerBulan) {
            $bulan = $item->bulan;

            // Ambil biaya penjualan dan biaya tambahan dari Transactions untuk bulan yang sama
            $biayaTransaksi = $totalBiayaPerBulan->get($bulan);
            $biayaPenjualan = $biayaTransaksi->total_biaya_penjualan ?? 0;
            $biayaLain = $biayaTransaksi->total_biaya ?? 0;

            // Hitung total biaya bulanan: biaya pembelian + biaya penjualan + biaya lain
            $item->total_biaya = $item->total_biaya_pembelian + $biayaPenjualan + $biayaLain;

            // Hitung total keuntungan bulanan: pendapatan - total biaya
            $item->total_keuntungan = $item->total_pendapatan - $item->total_biaya;

            return $item;
        });

        // Hitung total pendapatan, total biaya, dan total keuntungan
        $totalPendapatan = $rekapLaporan->sum('total_pendapatan');
        $totalBiaya = $rekapLaporan->sum('total_biaya');
        $totalKeuntungan = $rekapLaporan->sum('total_keuntungan');

        // Hitung pencapaian (contoh)
        $pencapaian = $rekapLaporan->count();

        // Kirim data ke view
        return view('forms.rekap', [
            'rekapLaporan' => $rekapLaporan,
            'totalPendapatan' => $totalPendapatan,
            'totalBiaya' => $totalBiaya,
            'totalKeuntungan' => $totalKeuntungan,
            'pencapaian' => $pencapaian,
        ]);
    }

    public function cetak()
    {
        // Logic untuk mencetak laporan
        // ...
    }
}
