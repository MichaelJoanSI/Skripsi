<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Barang;
use App\Models\Invoice;
use App\Models\InvoicePembelian;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::where('user_id', Auth::id())->get();
        $barang = Barang::all();
        return view('forms.pembelian', compact('pembelian', 'barang'));
    }

    public function detail()
    {
        $pembelian = Pembelian::all();
        return view('forms.detailpembelian', compact('pembelian'));
    }

    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('pembelian.edit', compact('pembelian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_pembelian' => 'required',
            'nama_barang' => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
            'satuan' => 'required',
            'harga_beli' => 'required',
            'quantity' => 'required',
            'sub_total' => 'required',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Pembelian updated successfully.');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'id_barang' => 'required|exists:barang,id',
            'nama_barang' => 'required',
            'tgl_masuk' => 'nullable|date',
            'tgl_keluar' => 'nullable|date',
            'satuan' => 'required',
            'harga_beli' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            'sub_total' => 'required|numeric|min:1',
        ]);

        $kode_pembelian = $this->generateKodePembelian($request->nama_barang);

        // Pembelian::create([
        //     'user_id' => Auth::id(),
        //     'kode_pembelian' => $kode_pembelian,
        //     'nama_barang' => $request->nama_barang,
        //     'tgl_masuk' => $request->tgl_masuk,
        //     'tgl_keluar' => $request->tgl_keluar,
        //     'satuan' => $request->satuan,
        //     'harga_beli' => $request->harga_beli,
        //     'quantity' => $request->quantity,
        //     'biaya_tambahan' => $request->biaya_tambahan,
        //     'diskon' => $request->diskon,
        //     'sub_total' => $request->sub_total,
        // ]);

        DB::transaction(function () use ($request, $kode_pembelian) {
            // Simpan data transaksi
            $pembelian = Pembelian::create([
                'user_id' => Auth::id(),
                'id_barang' => $request->id_barang,
                'id_pembelian' => $request->id_pembelian,
                'kode_pembelian' => $kode_pembelian,
                'nama_barang' => $request->nama_barang,
                'tgl_masuk' => $request->tgl_masuk,
                'tgl_keluar' => $request->tgl_keluar,
                'satuan' => $request->satuan,
                'harga_beli' => $request->harga_beli,
                'quantity' => $request->quantity,
                'sub_total' => $request->sub_total,
            ]);

            // Buat invoice dengan id_pembelian dari pembelian yang baru dibuat
            InvoicePembelian::create([
                'user_id' => Auth::id(),
                'id_barang' => $request->id_barang,
                'id_pembelian' => $pembelian->id, // Reference the newly created Pembelian record
                'kode_invoice' => $this->generateKodeInvoice(),
            ]);
        });

        return redirect()->route('pembelian.index')->with('success', 'Transaction recorded successfully');
    }

    public function delete($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian deleted successfully.');
    }

    private function generateKodePembelian($nama_barang)
    {
        // Ambil item terakhir berdasarkan kategori untuk mengambil kode terakhir
        $pembelianTerakhir = Pembelian::where('nama_barang', $nama_barang)->orderBy('id', 'desc')->first();

        // Inisialisasi awalan kode berdasarkan kategori
        $prefix = strtoupper(substr($nama_barang, 0, 3)); // Mengambil 3 huruf pertama dari kategori

        // Jika barang terakhir tidak ditemukan, mulai dari 001
        if (!$pembelianTerakhir) {
            return $prefix . '001';
        }

        // Ambil nomor urutan terakhir dari kode barang dan tambahkan 1
        $nomorTerakhir = substr($pembelianTerakhir->kode_pembelian, 3); // Ambil bagian angka dari kode_barang
        $nomorBaru = str_pad((int) $nomorTerakhir + 1, 3, '0', STR_PAD_LEFT); // Tambahkan 1 dan format ke 3 digit

        // Gabungkan prefix dan nomor baru
        return $prefix . $nomorBaru;
    }

    public function generateKodeInvoice()
    {
        // Prefiks kode invoice, bisa diubah sesuai kebutuhan
        $prefix = 'INV';

        // Ambil nomor invoice terakhir yang ada di database
        $lastInvoice = Invoice::orderBy('created_at', 'desc')->first();

        if ($lastInvoice) {
            // Ekstrak nomor terakhir dan tambahkan 1
            $lastNumber = intval(substr($lastInvoice->kode_invoice, strlen($prefix) + 1));
            $newNumber = $lastNumber + 1;
        } else {
            // Jika belum ada invoice, mulai dari 1
            $newNumber = 1;
        }

        // Format nomor baru, contoh: INV-0001
        $kodeInvoice = sprintf('%s-%04d', $prefix, $newNumber);

        return $kodeInvoice;
    }
}
