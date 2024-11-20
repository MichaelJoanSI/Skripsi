<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Barang;
use App\Models\Invoice;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transactions::where('user_id', Auth::id())->get();
        $barang = Barang::all(); // Mengambil semua data barang
        return view('forms.penjualan', compact('transactions', 'barang'));
    }

    public function detail()
    {
        $transactions = Transactions::all();
        return view('forms.detailpenjualan', compact('transactions'));
    }

    public function edit($id)
    {
        $transaction = Transactions::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function delete($id)
    {
        $pembelian = Transactions::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Transaction deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'nama_transaction' => 'required',
            'satuan' => 'required',
            'jenis' => 'required',
            'harga_jual' => 'required',
            'quantity' => 'required',
            'sub_total' => 'required',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    // public function create()
    // {
    //     return view('transactions.create');
    // }

    public function store(Request $request)
    {
        // Validasi input
        //dd($request->all());
        $request->validate([
            'id_barang' => 'required|exists:barang,id',
            'nama_transaction' => 'required',
            'satuan' => 'required',
            'jenis' => 'required',
            'harga_jual' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            'sub_total' => 'required|numeric|min:1',
        ]);

        // Generate kode penjualan
        $kode_penjualan = $this->generateKodePenjualan($request->nama_transaction);

        // Simpan data transaksi dan buat invoice dalam satu blok transaksi
        DB::transaction(function () use ($request, $kode_penjualan) {
            // Simpan data transaksi
            $transaksi = Transactions::create([
                'user_id' => Auth::id(),
                'id_barang' => $request->id_barang,
                'kode_penjualan' => $kode_penjualan,
                'nama_transaction' => $request->nama_transaction,
                'satuan' => $request->satuan,
                'jenis' => $request->jenis,
                'harga_jual' => $request->harga_jual,
                'quantity' => $request->quantity,
                'sub_total' => $request->sub_total,
            ]);

            // Buat invoice dengan id_transaksi dari transaksi yang baru dibuat
            Invoice::create([
                'user_id' => Auth::id(),
                'id_barang' => $request->id_barang,
                'id_transaksi' => $transaksi->id,
                'kode_invoice' => $this->generateKodeInvoice(),
            ]);
        });

        return redirect()->route('transactions.index')->with('success', 'Transaction and invoice recorded successfully');
    }

    private function generateKodePenjualan($nama_transaction)
    {
        // Ambil item terakhir berdasarkan nama barang untuk mengambil kode terakhir
        $penjualanTerakhir = Transactions::where('nama_transaction', $nama_transaction)->orderBy('id', 'desc')->first();

        // Inisialisasi awalan kode berdasarkan tiga huruf pertama dari nama barang
        $words = explode(' ', strtoupper($nama_transaction)); // Memisahkan kata-kata dalam nama barang dan membuat huruf kapital
        $prefix = strtoupper(substr($words[0], 0, 2) . substr($words[1] ?? '', 0, 1)); // Mengambil 2 huruf pertama dari kata pertama dan 1 huruf pertama dari kata kedua

        // Jika transaksi terakhir tidak ditemukan, mulai dari 001
        if (!$penjualanTerakhir) {
            return $prefix . '001';
        }

        // Ambil nomor urutan terakhir dari kode barang dan tambahkan 1
        $nomorTerakhir = substr($penjualanTerakhir->kode_penjualan, 3); // Ambil bagian angka dari kode_penjualan
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
