<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('forms.barang', compact('barang'));
    }

    public function detailBarang()
    {
        $barang = Barang::all();
        return view('forms.detailbarang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nama_barang' => 'required',
            'satuan' => 'required',
            'kategori' => 'required',
            'stok_masuk' => 'required',
            'stok_keluar' => 'required',
            'supplier' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ]);

        $kode_barang = $this->generateKodeBarang($request->kategori);

        Barang::create([
            'id' => Auth::id(),
            'kode_barang' => $kode_barang,
            'nama' => $request->nama_barang,
            'satuan' => $request->satuan,
            'kategori' => $request->kategori,
            'stok_masuk' => $request->stok_masuk,
            'stok_keluar' => $request->stok_keluar,
            'supplier' => $request->supplier,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);

        return redirect()->route('detailbarang.index')->with('success', 'Data Barang recorded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return response()->json(['error' => 'Barang not found'], 404);
        }

        return response()->json([
            'id' => $barang->id,
            'nama' => $barang->nama,
            'jenis' => $barang->kategori,
            'satuan' => $barang->satuan,
            'harga_jual' => $barang->harga_jual,
            'harga_beli' => $barang->harga_beli,
            'stok' => $barang->stok,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        $barang->update($request->all());

        return redirect()->route('forms.barang')->with('success', 'Barang updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('forms.barang')->with('success', 'Barang deleted successfully.');
    }

    private function generateKodeBarang($kategori)
    {
        // Ambil item terakhir berdasarkan kategori untuk mengambil kode terakhir
        $barangTerakhir = Barang::where('kategori', $kategori)->orderBy('id', 'desc')->first();

        // Inisialisasi awalan kode berdasarkan kategori
        $prefix = strtoupper(substr($kategori, 0, 3)); // Mengambil 3 huruf pertama dari kategori

        // Jika barang terakhir tidak ditemukan, mulai dari 001
        if (!$barangTerakhir) {
            return $prefix . '001';
        }

        // Ambil nomor urutan terakhir dari kode barang dan tambahkan 1
        $nomorTerakhir = substr($barangTerakhir->kode_barang, 3); // Ambil bagian angka dari kode_barang
        $nomorBaru = str_pad((int) $nomorTerakhir + 1, 3, '0', STR_PAD_LEFT); // Tambahkan 1 dan format ke 3 digit

        // Gabungkan prefix dan nomor baru
        return $prefix . $nomorBaru;
    }
}
