<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembelian</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 500px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .card {
        width: 100%;
    }

    /* Mengatur container-fluid agar memiliki padding yang minimal sehingga terlihat melebar */
    .container-fluid {
        padding-left: 15px;
        padding-right: 15px;
    }

    /* Menyelaraskan tabel dan form agar sama panjang */
    .table {
        width: 100%;
    }

    .button-group {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    input[type="text"],
    input[type="number"],
    input[type="email"],
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .button-container {
        margin-top: 20px;
        /* Memberi jarak vertikal antara tabel dan tombol */
        text-align: right;
        /* Menyelaraskan tombol ke kanan */
    }

    .button-container .btn {
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
    }

    .button-container-wrapper {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        /* Adjust the gap as needed */
    }

    .table-responsive {
        overflow-x: auto;
        /* Agar tabel dapat discroll secara horizontal */
        width: 100%;
        /* Lebar penuh untuk container */
        margin-top: 20px;
        /* Tambahkan jarak dari form */
    }

    table.table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead th,
    .table tbody td {
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        /* Memastikan tabel tetap dalam satu baris */
    }

    /* Styling untuk tombol */
    .button-container {
        text-align: right;
        margin-top: 20px;
    }

    .button-container .btn {
        padding: 10px 20px;
        font-size: 16px;
    }
</style>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
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
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Pembelian</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    @php
                        // Mengambil data pengguna yang sedang login
                        $user = Auth::user();
                    @endphp
                    <div class="info">
                        @if ($user)
                            <a href="#" class="d-block">{{ $user->name }}</a>
                            <!-- Menampilkan nama user yang login -->
                        @else
                            <a href="#" class="d-block">Guest</a>
                            <!-- Tampilkan "Guest" jika tidak ada user yang login -->
                        @endif
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
                                    Dashboard
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
                        </div>
                        <div class="col-sm-6">
                            {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol> --}}
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <div class="card mb-5">
                <div class="card-body">
                    <h2 class="mb-4">Form Pembelian</h2>
                    <!-- Error handling -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('pembelian.store') }}" method="post">
                        @csrf
                        <!-- Pembelian -->
                        @php
                            $barang = App\Models\Barang::all();
                        @endphp

                        <!-- Pilih Jenis Barang -->
                        <div class="row mb-3">
                            <label for="barang" class="col-sm-2 col-form-label">Pilih Barang</label>
                            <div class="col-sm-10">
                                <select id="barang" name="id_barang" class="form-select" required>
                                    <option value="">Pilih barang</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Nama Barang -->
                        <div class="row mb-3">
                            <label for="nama_transaction" class="col-sm-2 col-form-label">Keterangan Barang:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    placeholder="Masukkan nama barang" required>
                            </div>
                        </div>

                        <!-- Tanggal Masuk -->
                        <div class="row mb-3">
                            <label for="satuan" class="col-sm-2 col-form-label">Tanggal Masuk:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk"
                                    placeholder="yyyy-mm-dd" required>
                            </div>
                        </div>

                        <!-- Tanggal Keluar -->
                        <div class="row mb-3">
                            <label for="satuan" class="col-sm-2 col-form-label">Tanggal Keluar:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar"
                                    placeholder="yyyy-mm-dd" required>
                            </div>
                        </div>

                        <!-- Satuan -->
                        <div class="row mb-3">
                            <label for="nama_transaction" class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="satuan" name="satuan"
                                    placeholder="Masukkan nama barang" required>
                            </div>
                        </div>

                        <!-- Harga Beli -->
                        <div class="row mb-3">
                            <label for="harga_jual" class="col-sm-2 col-form-label">Harga Barang</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="harga_beli" name="harga_beli"
                                    placeholder="Masukkan harga barang" required>
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div class="row mb-3">
                            <label for="nama_transaction" class="col-sm-2 col-form-label">Quantity:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="quantity" name="quantity"
                                    placeholder="Masukkan Quantity" required>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="row mb-3">
                            <label for="sub_total" class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sub_total" name="sub_total"
                                    placeholder="Total harga" readonly>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-info"
                                    onclick="window.location='{{ route('detailpembelian.index') }}'">Print</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-body">
                    <!-- Notifikasi sukses -->
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Tabel Transaksi -->
                    <div class="table-responsive"> <!-- Menambahkan table-responsive -->
                        <table id="data1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Pembelian</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Harga Barang</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $pembelian = App\Models\Pembelian::all();
                                @endphp
                                @foreach ($pembelian as $pembelian)
                                    <tr>
                                        <td>{{ $pembelian->kode_pembelian }}</td>
                                        <td>{{ $pembelian->nama_barang }}</td>
                                        <td>{{ $pembelian->satuan }}</td>
                                        <td>{{ $pembelian->harga_beli }}</td>
                                        <td>{{ $pembelian->quantity }}</td>
                                        <td>{{ $pembelian->sub_total }}</td>
                                        <td>
                                            <!-- Tombol Invoice per transaksi -->
                                            <a href="{{ route('admin.invoice2', ['pembelian_id' => $pembelian->id]) }}"
                                                class="btn btn-info">
                                                Invoice
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Tombol Invoice dengan jarak -->
                    <div class="button-container-wrapper">
                        <div class="button-container">
                            <button type="button" class="btn btn-success"
                                onclick="window.location.href='{{ route('admin.dashboard') }}'">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer text-center">
            <strong>TOKO BERKAT <a href="https://adminlte.io"></a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-light">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
                }
            });
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
    <script>
        // Ambil elemen input
        const hargaJual = document.getElementById('harga_beli');
        //const quantity = document.getElementById('quantity');
        const subTotal = document.getElementById('sub_total');

        // Fungsi untuk menghitung total
        function hitungTotal() {
            const harga = parseFloat(hargaJual.value) || 0;
            const total = harga;
            subTotal.value = total; // Update nilai subtotal
        }

        // Event listener untuk memantau perubahan harga dan quantity
        hargaJual.addEventListener('input', hitungTotal);
        quantity.addEventListener('input', hitungTotal);
    </script>
    <script>
        document.getElementById("barang").addEventListener("change", function() {
            const barangId = this.value;

            // Cek jika barangId tidak kosong
            if (barangId) {
                fetch(`/barang/${barangId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Mengisi data ke dalam form setelah barang dipilih
                        document.getElementById("nama_barang").value = data.nama; // Nama barang
                        document.getElementById("harga_beli").value = data.harga_beli; // Harga beli
                        document.getElementById("satuan").value = data.satuan; // Satuan
                        document.getElementById("diskon").value = ""; // Reset diskon jika ada
                        document.getElementById("sub_total").value = ""; // Reset subtotal

                        updateTotal(); // Panggil fungsi untuk update total
                    })
                    .catch(error => console.error("Error fetching barang data:", error));
            }
        });

        // Fungsi untuk menghitung subtotal tanpa diskon dan biaya tambahan
        function updateTotal() {
            const hargaBeli = parseFloat(document.getElementById("harga_beli").value) || 0;
            const quantity = parseFloat(document.getElementById("quantity").value) || 1;

            // Hitung subtotal hanya berdasarkan harga beli dan quantity
            const total = hargaBeli * quantity;

            // Update nilai subtotal di input
            document.getElementById("sub_total").value = total.toFixed(2);
        }

        // Event listener untuk memperbarui subtotal saat quantity diubah
        document.getElementById("quantity").addEventListener("input", updateTotal);
    </script>
</body>

</html>
