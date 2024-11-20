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
    .nav-tabs {
        margin-bottom: 20px;
    }

    /* Tampilan aktif pada tab navigation */
    .nav-tabs .nav-link.active {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    /* Style untuk tabel */
    .table-responsive {
        margin-top: 15px;
    }

    /* Menambahkan padding pada tabel */
    .table th,
    .table td {
        padding: 10px;
        vertical-align: middle;
    }

    /* Warna garis tabel */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 123, 255, 0.05);
    }

    /* Hover effect untuk tabel */
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1);
    }

    /* Menambahkan border pada tabel */
    .table {
        border: 1px solid #dee2e6;
    }

    /* Style untuk header tabel */
    .table thead th {
        background-color: #007bff;
        color: white;
        border-bottom: 2px solid #dee2e6;
    }

    /* Responsive di mobile */
    @media (max-width: 768px) {
        .table-responsive {
            margin-top: 10px;
        }

        .nav-tabs {
            font-size: 14px;
        }

        .table th,
        .table td {
            padding: 8px;
        }
    }

    .lead-date {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .table-summary th,
    .table-summary td {
        padding: 10px;
        vertical-align: middle;
    }

    .table-summary th {
        width: 50%;
        text-align: left;
        font-weight: bold;
        color: #555;
    }

    .table-summary td {
        text-align: right;
        font-weight: bold;
        color: #333;
    }

    .table-summary tr:last-child td,
    .table-summary tr:last-child th {
        border-top: 2px solid #333;
        font-size: 1.1rem;
    }

    .table-summary-container {
        width: 100%;
        max-width: 500px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
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
</style>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link" style="color: blue;">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" style="color: blue;">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-//dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Toko Berkat</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Michael Joan R</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Transaksi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.penjualan') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penjualan</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.pembelian') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pembelian</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Barang
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.barang') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Barang</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.email') }}" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Mailbox
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Laporan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('rekap.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rekap Laporan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.faq') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.contacts') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kontak</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Invoice</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

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
                                    @php
                                        $pembelian = App\Models\Pembelian::all();
                                    @endphp
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
                                        // $invoice = App\Models\InvoicePembelian::first();
                                        $user = Auth::user();
                                    @endphp
                                    <div class="col-sm-4 invoice-col">
                                        {{-- @if ($invoice)
                                            <b>Invoice {{ $invoice->kode_invoice }}</b><br>
                                        @else
                                            <b>Invoice tidak ditemukan.</b><br>
                                        @endif --}}
                                    <b>Order ID:</b> {{ $invoice->id_pembelian }}<br>
                                    {{-- <b>Payment Due:</b> {{ $tanggal }}<br> --}}
                                    <b>Account:</b> {{$user->name}}
                                </div>
                            </div>
                                <!-- First Table: Penjualan -->
                                <div class="container mt-4">
                                    <h3>Detail Invoice</h3>
                                    {{-- <p><strong>Tanggal Transaksi:</strong> {{ $tanggal }}</p> --}}
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode Pembelian</th>
                                                <th>Nama Barang</th>
                                                <th>Satuan</th>
                                                <th>Harga Beli</th>
                                                <th>Quantity</th>
                                                <th>Total Pembelian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($relatedInvoices as $relatedInvoice)
                                            <tr>
                                                <td>{{ $relatedInvoice->kode_pembelian }}</td>
                                                <td>{{ $relatedInvoice->nama_barang }}</td>
                                                <td>{{ $relatedInvoice->satuan }}</td>
                                                <td>Rp.{{ number_format($relatedInvoice->harga_beli, 2) }}</td>
                                                <td>{{ $relatedInvoice->quantity }}</td>
                                                <td>Rp.{{ number_format($relatedInvoice->sub_total, 2) }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada transaksi lain pada tanggal ini.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Payment Summary -->
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
                                        <p class="text-danger">Anda Mendapatkan Diskon.</p>
                                    @endif
                                </div>

                                <!-- Buttons for Print and Payment -->
                                <div class="row no-print left-aligned-buttons">
                                    <button type="button" class="btn btn-primary" id="generate-pdf-btn"
                                        data-id="{{ $invoice->id }}">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
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
    @section('scripts')
        <script>
            // Script to toggle between tables
            document.getElementById('penjualanLink').addEventListener('click', function() {
                document.getElementById('penjualanTable').style.display = 'block';
                document.getElementById('furnitureTable').style.display = 'none';
            });

            document.getElementById('furnitureLink').addEventListener('click', function() {
                document.getElementById('penjualanTable').style.display = 'none';
                document.getElementById('furnitureTable').style.display = 'block';
            });
        </script>
    @endsection
    <script>
        document.getElementById('generate-pdf-btn').addEventListener('click', function() {
            const pembelianId = this.getAttribute('data-id');
            if (pembelianId) {
                window.location.href = `/forms/invoice2/pdf/${pembelianId}`;
            } else {
                console.error('ID pembelian tidak ditemukan.');
            }
        });
    </script>
</body>

</html>
