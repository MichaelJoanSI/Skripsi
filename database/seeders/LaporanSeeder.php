<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rekaplaporan;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Laporan::create([
            'nama_barang' => 'Gula',
            'quantity' => 50,
            'total' => 100000,
            'tanggal_laporan' => now(),
        ]);

        Laporan::create([
            'nama_barang' => 'Garam',
            'quantity' => 100,
            'total' => 50000,
            'tanggal_laporan' => now(),
        ]);
    }
}