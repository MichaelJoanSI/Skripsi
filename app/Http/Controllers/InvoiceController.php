<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transactions;
use App\Models\Pembelian;
use App\Models\User;
use PDF;
use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        // Mengambil data pembayaran dengan penyewa menggunakan pagination (5 data per halaman)
        $transactions = Transactions::with('user')->paginate(5);

        // Mengambil data pembayaran furniture dengan penyewa dan furniture menggunakan pagination (5 data per halaman)
        $pembelian = Pembelian::with('user')->paginate(5);

        // Mengirim data 'payments' dan 'furniturePayments' ke view
        return view('invoice.index', compact('transactions', 'pembelian'));
    }

    public function create()
    {
        // Anda bisa mengambil data customer atau produk di sini jika diperlukan
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|integer',
            'kode_invoice' => 'required|string|max:255|unique:invoices',
            'items' => 'required|array',
            'items.*.id_barang' => 'required|integer',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric',
            'payment_due' => 'required|date',
            'diskon' => 'nullable|numeric|min:0|max:100',
        ]);

        // Hitung harga setelah diskon
        $hargaJual = $validatedData['harga_jual'];
        $diskon = $validatedData['diskon'] ?? 0;
        $hargaSetelahDiskon = $hargaJual - $hargaJual * ($diskon / 100);

        // Hitung subtotal
        $quantity = $validatedData['quantity'];
        $subTotal = $hargaSetelahDiskon * $quantity;

        // Simpan transaksi ke database
        $transaction = new Transactions();
        $transaction->nama_transaction = $validatedData['nama_transaction'];
        $transaction->satuan = $validatedData['satuan'];
        $transaction->jenis = $validatedData['jenis'];
        $transaction->harga_jual = $hargaJual;
        $transaction->diskon = $diskon;
        $transaction->quantity = $quantity;
        $transaction->sub_total = $subTotal;
        $transaction->save();

        return redirect()->route('invoices.index')->with('success', 'Invoice berhasil dibuat!');
    }

    public function show($transaction_id)
    {
        // Mengambil satu invoice berdasarkan ID
        $id = $transaction_id;
        // $invoice = Invoice::find($id);
        $invoice = DB::table('transactions')->join('invoice', 'transactions.id', '=', 'invoice.id_transaksi')->select('transactions.*', 'invoice.*')->where('invoice.id_transaksi', $id)->first();

        if (!$invoice) {
            return redirect()->route('admin.penjualan')->with('error', 'Invoice tidak ditemukan.');
        }

        // Ambil tanggal dari transaksi yang ditemukan
        $tanggalTransaksi = Carbon::parse($invoice->created_at)->toDateString();

        // Cari semua transaksi dengan tanggal yang sama
        $relatedInvoices = DB::table('transactions')->join('invoice', 'transactions.id', '=', 'invoice.id_transaksi')->select('transactions.*', 'invoice.*')->whereDate('transactions.created_at', $tanggalTransaksi)->get();

        //dd($invoice);
        Carbon::setLocale('id');
        $tanggal = Carbon::parse($invoice->created_at)->translatedFormat('l, d F Y');
        return view('forms.invoice', compact('invoice', 'relatedInvoices', 'tanggal'));
    }

    public function show2($pembelian_id)
    {
        // Mengambil satu invoice berdasarkan ID pembelian
        $id = $pembelian_id;

        $invoice = DB::table('pembelian')->join('invoice_pembelian', 'pembelian.id', '=', 'invoice_pembelian.id_pembelian')->select('pembelian.*', 'invoice_pembelian.*')->where('invoice_pembelian.id_pembelian', $id)->first();

        // Debug untuk memastikan data terambil
        //dd($invoice);

        if (!$invoice) {
            return redirect()->route('admin.pembelian')->with('error', 'Invoice tidak ditemukan.');
        }

        // Ambil tanggal dari transaksi yang ditemukan
        $tanggalPembelian = Carbon::parse($invoice->created_at)->toDateString();

        $relatedInvoices = DB::table('pembelian')->join('invoice_pembelian', 'pembelian.id', '=', 'invoice_pembelian.id_pembelian')->select('pembelian.*', 'invoice_pembelian.*')->whereDate('pembelian.created_at', $tanggalPembelian)->get();

        // Pastikan `created_at` ada di data hasil query
        Carbon::setLocale('id');
        $tanggal = Carbon::parse($invoice->created_at)->translatedFormat('l, d F Y');

        return view('forms.invoice2', compact('invoice', 'relatedInvoices', 'tanggal'));
    }

    public function processDiskon(Request $request)
    {
        // Validasi input
        //dd($request->all());
        $request->validate([
            'diskon' => 'required|numeric|min:0|max:100',
            'total' => 'required|numeric',
            'bayar' => 'required|numeric|min:0',
        ]);

        // Ambil data dari form
        $diskon = $request->input('diskon');
        $total = $request->input('total');
        $bayar = $request->input('bayar');

        // Hitung total setelah diskon
        $totalSetelahDiskon = $total - $total * ($diskon / 100);

        // Hitung kembalian
        $kembalian = $bayar - $totalSetelahDiskon;

        // Simpan atau proses data lainnya sesuai kebutuhan Anda

        // Redirect ke halaman invoice dengan pesan sukses dan hasil perhitungan
        return redirect()->back()->with('success', 'Diskon berhasil dihitung!')->with('totalSetelahDiskon', $totalSetelahDiskon)->with('kembalian', $kembalian);
    }

    public function generatePDF($transaction_id)
    {
        // Mengambil data transaksi dan invoice berdasarkan ID transaksi
        $invoice = DB::table('transactions')->join('invoice', 'transactions.id', '=', 'invoice.id_transaksi')->select('transactions.*', 'invoice.*')->where('invoice.id', $transaction_id)->first();

        if (!$invoice) {
            return redirect()->route('admin.penjualan')->with('error', 'Invoice tidak ditemukan.');
        }

        // Ambil tanggal transaksi dari invoice yang ditemukan
        $tanggalTransaksi = Carbon::parse($invoice->created_at)->toDateString();

        // Cari semua transaksi pada tanggal yang sama
        $relatedInvoices = DB::table('transactions')->join('invoice', 'transactions.id', '=', 'invoice.id_transaksi')->select('transactions.*', 'invoice.*')->whereDate('transactions.created_at', $tanggalTransaksi)->get();

        // Format tanggal menggunakan Carbon
        Carbon::setLocale('id');
        $tanggal = Carbon::parse($invoice->created_at)->translatedFormat('l, d F Y');

        // Tambahkan ID transaksi untuk membedakan PDF dengan nama file
        $fileName = 'Invoice_' . $transaction_id . '_' . Carbon::now()->format('YmdHis') . '.pdf';

        // Generate PDF
        $pdf = \PDF::loadView('forms.detail-invoice', compact('invoice', 'relatedInvoices', 'tanggal'));

        // Return PDF untuk di-download
        return $pdf->download($fileName);
    }

    public function generatePDF2($pembelian_id)
    {
        $id = $pembelian_id;

        $invoice = DB::table('pembelian')->join('invoice_pembelian', 'pembelian.id', '=', 'invoice_pembelian.id_pembelian')->select('pembelian.*', 'invoice_pembelian.*')->where('invoice_pembelian.id', $id)->first();

        $tanggalPembelian = Carbon::parse($invoice->created_at)->toDateString();

        $relatedInvoices = DB::table('pembelian')->join('invoice_pembelian', 'pembelian.id', '=', 'invoice_pembelian.id_pembelian')->select('pembelian.*', 'invoice_pembelian.*')->whereDate('pembelian.created_at', $tanggalPembelian)->get();

        //dd($invoice);

        // Tanggal
        Carbon::setLocale('id');
        $tanggal = Carbon::parse($invoice->created_at)->translatedFormat('l, d F Y');

        // Nama file menggunakan tanggal dan ID
        $fileName = 'Invoice_' . $pembelian_id . '_' . Carbon::parse($invoice->created_at)->format('Ymd') . '.pdf';

        // Generate PDF
        $pdf = \PDF::loadView('forms.detail-invoice2', compact('invoice', 'relatedInvoices', 'tanggal'));

        // Return PDF untuk di-download
        return $pdf->download($fileName);
    }
}
