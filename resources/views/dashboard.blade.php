<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/SIAPRRI.png') }}">
    <title>SIAPRRI – Permintaan Barang dan Peminjaman Kendaraan Dinas</title>
    <link rel="stylesheet" href="{{ asset('bt/css/bootstrap.css') }}"><!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"><!-- Bootstrap Min CSS -->   
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}">
    <style>
        body {
            background-color: #f4f6fa;
        }
        .navbar {
            box-shadow: 0 2px 8px rgba(48,91,169,0.08);
        }
        .table thead {
            background-color: #3f76e2;
            color: #fff;
        }
        .btn-action {
            margin-right: 5px;
            transition: background 0.2s, color 0.2s;
        }
        .btn-action:hover {
            opacity: 0.85;
            transform: scale(1.05);
        }
        .card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(48,91,169,0.10);
            border: none;
            transition: box-shadow 0.2s;
        }
        .card:hover {
            box-shadow: 0 8px 32px rgba(48,91,169,0.15);
        }
        .table {
            border-radius: 12px;
            overflow: hidden;
        }
        .btn-success, .btn-primary, .btn-warning, .btn-danger, .btn-info {
            border-radius: 8px;
            font-weight: 500;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .btn-success:hover, .btn-primary:hover, .btn-warning:hover, .btn-danger:hover, .btn-info:hover {
            box-shadow: 0 2px 8px rgba(48,91,169,0.12);
            transform: translateY(-2px) scale(1.04);
        }
        .modal-content {
            border-radius: 16px;
            background: #fafdff;
        }
        .modal-header {
            background: #3f76e2;
            color: #fff;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }
        .modal-title {
            font-weight: bold;
        }
        .navbar-brand {
            letter-spacing: 2px;
            font-size: 1.4rem;
        }
        .nav-link.active {
            box-shadow: 0 2px 8px rgba(48,91,169,0.10);
            border-radius: 8px;
        }
        .dropdown-menu {
            border-radius: 10px;
        }
        .form-control:focus {
            border-color: #3f76e2;
            box-shadow: 0 0 0 0.2rem rgba(48,91,169,0.08);
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg" style="background-color: #3f76e2;">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold d-flex align-items-center" href="#">
            <span style="background: #fff; border-radius: 50px; padding: 4px 12px; display: flex; align-items: center;">
                <img src="http://localhost/images/SIAPRRI.png" alt="SIAPRRI Logo" style="height: 36px; margin-right: 10px;">
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 ms-5 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle @if(request()->is('/') || request()->is('fitur')) active bg-white text-primary @else text-white @endif fw-semibold" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Daftar Data
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                        <li>
                            <a class="dropdown-item @if(request()->is('/')) active @endif" href="{{ route('dashboard', ['menu' => 'barang']) }}">Data Barang</a>
                        </li>
                        <li>
                            <a class="dropdown-item @if(request()->is('fitur')) active @endif" href="{{ route('dashboard', ['menu' => 'kendaraan']) }}">Data Kendaraan</a>
                        </li>
                        @if (isset($_COOKIE['status']) && $_COOKIE['status'] == 'umum')
                            <li>
                                <a class="dropdown-item @if(request()->is('fitur')) active @endif" href="{{ route('dashboard', ['menu' => 'dpegawai']) }}">Data Pegawai</a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" id="transaksiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Daftar Transaksi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="transaksiDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('dashboard', ['menu' => 'tbarang']) }}">Transaksi Barang</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('dashboard', ['menu' => 'tkendaraan']) }}">Transaksi Kendaraan</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1"></i>
                        {{ $nama }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-person me-2"></i> Profil
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

@if ($menu == 'barang')
    @include('dashboard.umum.dataBarang')
    @elseif ($menu == 'kendaraan')
    @include('dashboard.umum.dataKendaraan')
    @elseif ($menu == 'tbarang')
    @include('dashboard.umum.transaksi_barang')
    @elseif ($menu == 'tkendaraan')
    @include('dashboard.umum.transaksi_kendaraan')
    @elseif ($menu == 'dpegawai')
    @include('dashboard.admin.data_pegawai')
    @endif

    <!-- Bootstrap JS and dependencies -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
