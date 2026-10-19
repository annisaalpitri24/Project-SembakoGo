<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Penjual') - SembakoGo</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #111827;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #fff;
            border-right: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            z-index: 10;
            overflow-y: auto;
        }

        /* LOGO SEMBAKOGO */
        .brand {
            height: 100px;
            min-height: 100px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px 26px;
            background:
                linear-gradient(120deg,
                    #075c46 0%,
                    #004d3c 55%,
                    #00634b 100%);
            font-size: 23px;
            font-weight: bold;
            white-space: nowrap;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            border-radius: 11px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        }

        .brand-icon svg {
            width: 24px;
            height: 24px;
        }

        .brand-text {
            color: #ffffff;
            letter-spacing: -0.6px;
        }

        .brand-text span {
            color: #65d6ad;
        }

        /* MENU SIDEBAR */
        .menu-title {
            padding: 28px 20px 12px;
            color: #94a3b8;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        .menu {
            padding: 0 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px;
            margin-bottom: 6px;
            border-radius: 12px;
            color: #64748b;
            transition: background 0.2s, color 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #eafbf4;
            color: #007d5a;
        }

        .menu-icon {
            width: 22px;
            min-width: 22px;
            text-align: center;
            font-size: 18px;
        }

        /* INFORMASI TOKO DI BAWAH SIDEBAR */
        .sidebar-bottom {
            margin-top: auto;
            padding: 15px;
            border-top: 1px solid #e2e8f0;
        }

        .store-info {
            background: #f8fafc;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 12px;
            overflow-wrap: anywhere;
        }

        .store-info strong {
            display: block;
            margin-bottom: 5px;
        }

        .store-info small {
            color: #64748b;
        }

        .logout {
            display: block;
            text-align: center;
            padding: 12px;
            color: #64748b;
            font: inherit;
            border-radius: 8px;
        }

        .logout:hover {
            background: #f1f5f9;
        }

        /* AREA UTAMA */
        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        /* NAVBAR ATAS */
        .topbar {
            height: 100px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 35px;
            gap: 20px;
        }

        .search {
            width: 45%;
            max-width: 550px;
            padding: 16px 20px;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            background: #f8fafc;
            font-size: 16px;
            outline: none;
        }

        .search:focus {
            border-color: #00845f;
            background: #fff;
        }

        .topbar-user {
            text-align: right;
        }

        .topbar-user strong {
            display: block;
            margin-bottom: 5px;
        }

        .topbar-user small {
            color: #64748b;
        }

        /* KONTEN HALAMAN */
        .content {
            padding: 35px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-heading h1 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .page-heading p {
            color: #64748b;
            margin: 0;
            line-height: 1.6;
        }

        /* TOMBOL */
        .btn {
            display: inline-block;
            border: none;
            border-radius: 10px;
            padding: 12px 18px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: background 0.2s;
        }

        .btn-primary {
            background: #00845f;
            color: white;
        }

        .btn-primary:hover {
            background: #006b4c;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #cbd5e1;
        }

        /* KARTU */
        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 2px 5px rgba(15, 23, 42, 0.03);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .stat-label {
            color: #64748b;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        /* TABEL KATEGORI */
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        th {
            color: #64748b;
            background: #f8fafc;
            font-size: 13px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            font: inherit;
            background: #fff;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #00845f;
            box-shadow: 0 0 0 3px rgba(0, 132, 95, 0.1);
        }

        .form-group textarea {
            min-height: 110px;
            resize: vertical;
        }

        /* PESAN */
        .alert {
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        /* TABLET */
        @media (max-width: 1000px) {
            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
            }

            .brand {
                padding: 20px 15px;
                font-size: 21px;
            }

            .content {
                padding: 25px;
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }



        /* HP */
        @media (max-width: 600px) {
            .sidebar {
                width: 75px;
            }


            .brand {
                height: 100px;
                min-height: 100px;
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 20px 26px;
                background: linear-gradient(120deg,
                        #075c46 0%,
                        #004d3c 55%,
                        #00634b 100%);
                font-size: 23px;
                font-weight: bold;
                white-space: nowrap;
            }

            .brand-icon {
                width: 42px;
                height: 42px;
                min-width: 42px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #ffffff;
                border-radius: 11px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
                font-size: 21px;
            }

            .brand-text {
                color: #ffffff;
                letter-spacing: -0.6px;
            }

            .brand-text span {
                color: #65d6ad;
            }

            .menu-title,
            .menu-label,
            .store-info,
            .logout-label {
                display: none;
            }

            .menu {
                padding: 0 7px;
            }

            .menu a {
                justify-content: center;
                padding: 15px 5px;
            }

            .menu-icon {
                font-size: 20px;
            }

            .sidebar-bottom {
                padding: 8px 5px;
            }

            .main {
                margin-left: 75px;
            }

            .topbar {
                height: 80px;
                padding: 12px;
                gap: 10px;
            }

            .search {
                width: 60%;
                min-width: 0;
                padding: 12px;
                font-size: 13px;
            }

            .topbar-user {
                font-size: 11px;
                overflow-wrap: anywhere;
            }

            .content {
                padding: 18px 12px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-heading h1 {
                font-size: 24px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 18px;
            }

            th,
            td {
                padding: 10px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <!-- LOGO SEMBAKOGO -->

        <!-- LOGO SEMBAKOGO -->
        <div class="brand">
            <div class="brand-icon">
                🛒
            </div>

            <span class="brand-text">
                Sembako<span>Go</span>
            </span>
        </div>

        <!-- MENU UTAMA -->
        <div class="menu-title">MENU UTAMA</div>

        <nav class="menu">
            <a href="{{ route('penjual.dashboard') }}"
                class="{{ request()->routeIs('penjual.dashboard') ? 'active' : '' }}">
                <span class="menu-icon">⌂</span>
                <span class="menu-label">Beranda</span>
            </a>

            <a href="{{ route('penjual.profil') }}"
                class="{{ request()->routeIs('penjual.profil') ? 'active' : '' }}">
                <span class="menu-icon">🏪</span>
                <span class="menu-label">Profil Toko</span>
            </a>

            <a href="{{ route('penjual.kategori.index') }}"
                class="{{ request()->routeIs('penjual.kategori.*') ? 'active' : '' }}">
                <span class="menu-icon">▦</span>
                <span class="menu-label">Kategori</span>
            </a>


            <a href="{{ route('penjual.produk.index') }}"
                class="sidebar-link {{ request()->routeIs('penjual.produk.*') ? 'active' : '' }}">
                <span class="sidebar-icon">📦</span>
                <span>Produk</span>
            </a>

        </nav>

        <!-- INFORMASI TOKO DAN LOGOUT -->
        <div class="sidebar-bottom">
            <div class="store-info">
                <strong>
                    {{ auth()->user()->store->nama_toko ?? 'Toko Saya' }}
                </strong>
                <small>Mitra Penjual</small>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="logout"
                    style="width:100%;border:0;background:white;cursor:pointer;">
                    ↪ <span class="logout-label">Keluar</span>
                </button>
            </form>
        </div>

    </aside>

    <!-- AREA UTAMA -->
    <main class="main">

        <!-- NAVBAR ATAS -->
        <header class="topbar">
            <input
                class="search"
                type="text"
                placeholder="Cari pesanan atau produk..."
                aria-label="Cari pesanan atau produk">

            <div class="topbar-user">
                <strong>
                    {{ auth()->user()->store->nama_toko ?? auth()->user()->name }}
                </strong>
                <small>Dashboard Penjual</small>
            </div>
        </header>

        <!-- KONTEN HALAMAN -->
        <section class="content">

            @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-error">
                <strong>Terjadi kesalahan:</strong>

                <ul style="margin:0;padding-left:20px;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')

        </section>

    </main>

</body>

</html>