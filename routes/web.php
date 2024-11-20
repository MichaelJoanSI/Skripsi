<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InvoiceController;

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

Route::get('/', function () {
    return view('forms.login');
})->name('admin.login');

Route::get('/login', function () {
    return view('forms.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('forms.register');
})->name('admin.register');

Route::get('register', [RegisterController::class, 'register'])->name('auth.register');
Route::post('register', [RegisterController::class, 'create'])->name('post.register');

Route::get('/dashboard', function () {
    return view('index');
})->name('admin.dashboard');

// Route::get('/widgets', function () {
//     return view('widgets');
// })->name('admin.widgets');

// Route::get('views/forms/advanced', function () {
//     return view('forms.advanced');
// })->name('admin.advanced');

// Transaksi //
Route::get('views/forms/penjualan', function () {
    return view('forms.penjualan');
})->name('admin.penjualan');

Route::get('view/forms/pembelian', function () {
    return view('forms.pembelian');
})->name('admin.pembelian');

Route::get('views/forms/detailpenjualan', function () {
    return view('forms.detailpenjualan');
})->name('detail.penjualan');

Route::middleware(['auth'])->group(function () {
    Route::get('pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    // Route::get('pembelian/create', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('pembelian', [PembelianController::class, 'store'])->name('pembelian.store');
});

Route::get('forms/detailpembelian', [PembelianController::class, 'detail'])->name('detailpembelian.index');
Route::get('forms/detailpenjualan', [TransactionsController::class, 'detail'])->name('details.index');

Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{id}', [TransactionController::class, 'delete'])->name('transactions.delete');

Route::middleware(['auth'])->group(function () {
    Route::get('transactions', [TransactionsController::class, 'index'])->name('transactions.index');
    // Route::get('transactions/create', [TransactionsController::class, 'create'])->name('transactions.create');
    Route::post('transactions', [TransactionsController::class, 'store'])->name('transactions.store');
});

// Route::get('view/forms/rekap', function () {
//     return view('forms.rekap');
// })->name('admin.rekap');

Route::get('forms/rekap', [ReportController::class, 'rekap'])->name('rekap.index');
Route::get('/laporan/rekap', [ReportController::class, 'rekap'])->name('laporan.rekap');
Route::get('/laporan/cetak', [ReportController::class, 'cetak'])->name('laporan.cetak');

// Route::get('views/forms/calender', function () {
//     return view('forms.calender');
// })->name('admin.calender');

// Route::get('views/forms/charts', function () {
//     return view('forms.charts');
// })->name('admin.charts');

Route::get('views/forms/faq', function () {
    return view('forms.faq');
})->name('admin.faq');

Route::get('views/forms/email', function () {
    return view('forms.email');
})->name('admin.email');

Route::get('/email', [EmailController::class, 'create'])->name('email.create');
Route::post('/email', [EmailController::class, 'store'])->name('email.store');


Route::get('views/forms/contacts', function () {
    return view('forms.contacts');
})->name('admin.contacts');

// Route::get('views/forms/listkegiatan', function () {
//     return view('forms.listkegiatan');
// })->name('admin.kegiatan');

            // Barang //
Route::get('views/forms/barang', function () {
    return view('forms.barang');
})->name('admin.barang');

Route::get('views/forms/detailbarang', function () {
    return view('forms.detailbarang');
})->name('detail.barang');

Route::middleware(['auth'])->group(function () {
    Route::get('barang', [BarangController::class, 'index'])->name('barang.index');
    // Route::get('barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('barang', [BarangController::class, 'store'])->name('barang.store');
});

Route::get('/barang/{id}', [BarangController::class, 'show']);

Route::get('forms/detailbarang', [BarangController::class, 'detailbarang'])->name('detailbarang.index');

Route::get('views/forms/gallery', function () {
    return view('forms.gallery');
})->name('admin.gallery');

Route::get('views/forms/invoice', function () {
    return view('forms.invoice');
})->name('admin.invoice');

Route::get('/forms/invoice/{transaction_id}', [InvoiceController::class, 'show'])->name('admin.invoice');
// Route::get('/forms/invoice/invoice-by-date', [InvoiceController::class, 'showByDate'])->name('admin.invoice-by-date');

Route::get('views/forms/invoice2', function () {
    return view('forms.invoice2');
})->name('admin.invoice2');

Route::get('/forms/invoice2/{pembelian_id}', [InvoiceController::class, 'show2'])->name('admin.invoice2');

// Route::get('admin/invoice/{id}', [InvoiceController::class, 'show']);
Route::get('/forms/invoice/pdf/{transaction_id}', [InvoiceController::class, 'generatePDF'])->name('forms.invoice.pdf');
Route::get('/forms/invoice2/pdf/{pembelian_id}', [InvoiceController::class, 'generatePDF2'])->name('forms.invoice2.pdf');

Route::get('/forms/detail-invoice/pdf/{transaction_id}', [InvoiceController::class, 'generatePDF'])->name('forms.detail-invoice.pdf');
Route::get('/forms/detail-invoice2/pdf/{pembelian_id}', [InvoiceController::class, 'generatePDF2'])->name('forms.detail-invoice2.pdf');