<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<style>
    .container {
        max-width: 100%;
        padding: 20px;
    }

    /* Table styling */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    /* Header styling */
    .table thead th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    /* Row styling */
    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Number alignment for specific columns */
    .table td:nth-child(5),
    /* Harga */
    .table td:nth-child(7),
    /* Diskon */
    .table td:nth-child(8),
    /* Quantity */
    .table td:nth-child(8)

    /* Sub Total */
        {
        text-align: right;
    }

    /* Responsive adjustments */
    .table-responsive {
        overflow-x: auto;
    }

    /* Adjustments for smaller screens */
    @media (max-width: 768px) {

        .table th,
        .table td {
            font-size: 14px;
            padding: 8px;
        }
    }

    .table {
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }

    .table-header {
        background-color: #007bff;
        color: white;
        padding: 10px;
        text-align: center;
        font-weight: bold;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
        vertical-align: middle;
    }

    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    @media (max-width: 768px) {

        .table th,
        .table td {
            font-size: 12px;
            padding: 8px;
        }
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }

    .summary-table {
        margin-top: 20px;
        width: 50%;
        border: 1px solid #000;
        padding: 10px;
    }

    .summary-table th,
    .summary-table td {
        padding: 5px;
        text-align: right;
    }

    .summary-table tr:last-child th,
    .summary-table tr:last-child td {
        font-weight: bold;
        border-top: 2px solid #000;
    }

    body {
        margin: 10px;
        font-family: Arial, sans-serif;
    }

    .invoice-info {
        margin-bottom: 20px;
    }

    .invoice-col {
        padding: 15px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .invoice-col address {
        margin: 0;
        font-style: normal;
        line-height: 1.6;
    }

    .invoice-col strong {
        font-weight: bold;
        color: #333;
    }

    @media (min-width: 768px) {
        .invoice-info .invoice-col {
            flex-basis: 32%;
            margin-right: 1%;
        }

        .invoice-info .invoice-col:last-child {
            margin-right: 0;
        }
    }

    .main-footer {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        /* Sesuaikan jika perlu */
        background-color: #f8f9fa;
        /* Warna latar belakang opsional */
        color: #333;
        /* Warna teks opsional */
    }

    .left-aligned-buttons {
        display: flex;
        justify-content: flex-start;
        /* Untuk menempatkan tombol di sebelah kiri */
        gap: 10px;
        /* Jarak antar tombol */
        margin-top: 10px;
        /* Jarak dari elemen di atasnya, jika diperlukan */
    }

    .left-aligned-buttons .btn {
        /* Atur padding atau styling tambahan pada tombol jika diperlukan */
    }

    @media print {
        .content-wrapper {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .invoice {
            border: 1px solid #dee2e6;
            padding: 15px;
        }
    }
</style>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> Note:</h5>
                                Ini adalah bukti surat keterangan
                            </div>

                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i> Toko Berkat
                                            <small class="float-right">{{ $tanggal }}</small>
                                        </h4>
                                    </div>
                                </div>

                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            <strong>Toko Berkat</strong><br>Jalan Raya Selatan Wangon no.24<br>Wangon,
                                            55175<br>
                                            Phone: (204) 87653908<br>
                                            Email: tokoberkat24@gmail.com
                                        </address>
                                    </div>
                                    {{-- <div class="col-sm-4 invoice-col">
                                        To
                                        <address>
                                            <strong>Michael Joan R</strong><br>Jalan Ahmad Yamin no.110<br>Wangon,
                                            55175<br>
                                            Phone: (081) 898646453<br>
                                            Email: michaeljr269@gmail.com
                                        </address>
                                    </div> --}}
                                    @php
                                        // Pastikan untuk mengambil satu data invoice, misalnya invoice pertama
                                        $invoice = App\Models\Invoice::first();
                                        $user = Auth::user();
                                    @endphp
                                    <div class="col-sm-4 invoice-col">
                                        @if ($invoice)
                                            <b>Invoice {{ $invoice->kode_invoice }}</b><br>
                                        @else
                                            <b>Invoice tidak ditemukan.</b><br>
                                        @endif
                                        <b>Order ID:</b> {{ $invoice->id_transaksi }}<br>
                                        {{-- <b>Payment Due:</b> {{ $tanggal }}<br> --}}
                                        <b>Account:</b> {{ $user->name }}
                                    </div>
                                </div>

                                <!-- Penjualan Table -->
                                <div class="container mt-4">
                                    <h3>Detail Invoice</h3>
                                    {{-- <p><strong>Tanggal Transaksi:</strong> {{ $tanggal }}</p> --}}
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode Penjualan</th>
                                                <th>Nama Barang</th>
                                                <th>Satuan</th>
                                                <th>Keterangan</th>
                                                <th>Harga</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($relatedInvoices as $relatedInvoice)
                                                <tr>
                                                    <td>{{ $relatedInvoice->kode_penjualan }}</td>
                                                    <td>{{ $relatedInvoice->nama_transaction }}</td>
                                                    <td>{{ $relatedInvoice->satuan }}</td>
                                                    <td>{{ $relatedInvoice->jenis }}</td>
                                                    <td>Rp.{{ number_format($relatedInvoice->harga_jual, 2) }}</td>
                                                    <td>{{ $relatedInvoice->quantity }}</td>
                                                    <td>Rp.{{ number_format($relatedInvoice->sub_total, 2) }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak ada transaksi lain pada
                                                        tanggal ini.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Perhitungan Total, Pajak, dan Pengiriman -->
                                <div class="col-6 mt-4">
                                    @php
                                        use Carbon\Carbon;
                                
                                        // Inisialisasi subtotal
                                        $totalSubtotal = 0;
                                
                                        // Hitung total subtotal dari semua transaksi terkait
                                        foreach ($relatedInvoices as $relatedInvoice) {
                                            $totalSubtotal += $relatedInvoice->sub_total; // Ambil subtotal dari setiap transaksi
                                        }
                                
                                        // Ambil tanggal sekarang
                                        $currentDate = Carbon::now();
                                
                                        // Cek apakah diskon berlaku berdasarkan waktu (contoh: hanya berlaku akhir pekan)
                                        $isDiskonBerlakuWaktu = $currentDate->isWeekend(); // Diskon hanya berlaku di akhir pekan (Sabtu, Minggu)
                                
                                        // Cek apakah diskon berlaku berdasarkan subtotal
                                        $isDiskonBerlakuHarga = $totalSubtotal > 100000; // Diskon berlaku jika subtotal melebihi 100 ribu
                                
                                        // Inisialisasi diskon
                                        $diskonPersen = 0;
                                
                                        // Logika diskon hanya jika salah satu atau kedua syarat terpenuhi
                                        if ($isDiskonBerlakuWaktu || $isDiskonBerlakuHarga) {
                                            // Logika diskon berdasarkan subtotal
                                            if ($totalSubtotal > 1000000) {
                                                $diskonPersen = 20; // Diskon 20% jika subtotal lebih dari 1 juta
                                            } elseif ($totalSubtotal > 500000) {
                                                $diskonPersen = 15; // Diskon 15% jika subtotal lebih dari 500 ribu
                                            } elseif ($totalSubtotal > 100000) {
                                                $diskonPersen = 5; // Diskon 5% jika subtotal lebih dari 100 ribu
                                            }
                                        }
                                
                                        // Hitung jumlah diskon
                                        $diskon = $totalSubtotal * ($diskonPersen / 100);
                                
                                        // Subtotal setelah diskon
                                        $totalSubtotalSetelahDiskon = $totalSubtotal - $diskon;
                                
                                        // Biaya tambahan (contoh)
                                        $biayaTambahan = 50000; // Sesuaikan dengan kebutuhan
                                
                                        // Perhitungan pajak 5%
                                        $tax = $totalSubtotalSetelahDiskon * 0.05;
                                
                                        // Biaya pengiriman
                                        $shipping = 20000; // Sesuaikan dengan kebutuhan
                                
                                        // Total akhir
                                        $total = $totalSubtotalSetelahDiskon + $tax + $shipping + $biayaTambahan;
                                    @endphp
                                
                                    {{-- Tabel Ringkasan --}}
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>Rp.{{ number_format($totalSubtotal, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Diskon ({{ $diskonPersen }}%):</th>
                                                <td>Rp.{{ number_format($diskon, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total Setelah Diskon:</th>
                                                <td>Rp.{{ number_format($totalSubtotalSetelahDiskon, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Biaya Tambahan:</th>
                                                <td>Rp.{{ number_format($biayaTambahan, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>Rp.{{ number_format($total, 2) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                
                                    {{-- Informasi Diskon --}}
                                    @if ($diskonPersen > 0)
                                        <p class="text-success">
                                            Diskon berlaku! 
                                            @if ($isDiskonBerlakuWaktu && $isDiskonBerlakuHarga)
                                                Diskon diberikan karena hari ini adalah akhir pekan **dan** subtotal memenuhi ketentuan harga.
                                            @elseif ($isDiskonBerlakuWaktu)
                                                Diskon diberikan karena hari ini adalah akhir pekan.
                                            @elseif ($isDiskonBerlakuHarga)
                                                Diskon diberikan karena subtotal memenuhi ketentuan harga.
                                            @endif
                                        </p>
                                    @else
                                        <p class="text-danger">Diskon tidak berlaku. Tidak memenuhi syarat waktu atau harga.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer no-print">
        <strong>TOKO BERKAT.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-//dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script>
        document.getElementById('generate-pdf-btn').addEventListener('click', function() {
            const transactionId = this.getAttribute('data-id');
            if (transactionId) {
                window.location.href = `/forms/invoice/pdf/${transactionId}`;
            } else {
                console.error('ID transaksi tidak ditemukan.');
            }
        });
    </script>
</body>

</html>
