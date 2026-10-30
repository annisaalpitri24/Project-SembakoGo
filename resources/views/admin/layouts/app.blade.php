<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin SembakoGo') - SembakoGo</title>

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

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            inset: 0 auto 0 0;
            background: white;
            border-right: 1px solid #e2e8f0;
            z-index: 10;
        }

        .brand {
            height: 100px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px;
            background: linear-gradient(120deg, #075c46, #004d3c, #00634b);
            color: white;
            font-size: 23px;
            font-weight: bold;
        }

        .brand-icon {
            background: white;
            border-radius: 11px;
            padding: 10px;
        }

        .brand span {
            color: #65d6ad;
        }

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
        }

        .menu a:hover,
        .menu a.active {
            background: #eafbf4;
            color: #007d5a;
        }

        .menu-icon {
            width: 24px;
            text-align: center;
            font-size: 18px;
        }

        .sidebar-bottom {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 15px;
            border-top: 1px solid #e2e8f0;
        }

        .admin-info {
            padding: 14px;
            background: #f8fafc;
            border-radius: 12px;
            margin-bottom: 12px;
            overflow-wrap: anywhere;
        }

        .admin-info small {
            color: #64748b;
        }

        .logout {
            width: 100%;
            padding: 12px;
            border: 0;
            border-radius: 8px;
            background: white;
            color: #64748b;
            cursor: pointer;
            font-size: 14px;
        }

        .logout:hover {
            background: #f1f5f9;
        }

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            min-height: 100px;
            padding: 20px 35px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .topbar small {
            color: #64748b;
        }

        .content {
            padding: 35px;
        }

        .heading {
            margin-bottom: 28px;
        }

        .heading h1 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .heading p {
            margin: 0;
            color: #64748b;
            line-height: 1.6;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat-card,
        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 23px;
            box-shadow: 0 2px 5px rgba(15, 23, 42, .03);
        }

        .stat-card p {
            color: #64748b;
            margin: 0 0 15px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
        }

        .card {
            margin-bottom: 22px;
        }

        .card-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
        }

        .card-heading h2 {
            margin: 0;
            font-size: 20px;
        }

        .muted {
            color: #64748b;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            border: 0;
            border-radius: 9px;
            padding: 10px 14px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primary {
            background: #00845f;
            color: white;
        }

        .btn-primary:hover {
            background: #006b4c;
        }

        .btn-danger {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

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
            font-size: 14px;
        }

        th {
            color: #64748b;
            background: #f8fafc;
            font-size: 13px;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #fef3c7;
            color: #92400e;
            font-size: 12px;
            font-weight: bold;
        }

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

        .empty {
            color: #64748b;
            padding: 18px 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font: inherit;
        }

        .form-group textarea {
            min-height: 110px;
            resize: vertical;
        }

        @media (max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 72px;
            }

            .brand {
                padding: 12px;
                justify-content: center;
            }

            .brand-name,
            .menu-title,
            .menu-label,
            .admin-info,
            .logout-label {
                display: none;
            }

            .menu {
                padding: 0 6px;
            }

            .menu a {
                justify-content: center;
                padding: 15px 5px;
            }

            .main {
                margin-left: 72px;
            }

            .topbar {
                min-height: 75px;
                padding: 12px;
            }

            .content {
                padding: 18px 12px;
            }

            .heading h1 {
                font-size: 24px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .stat-card,
            .card {
                padding: 17px;
            }

            .card-heading {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">🛒</div>
            <div class="brand-name">Sembako<span>Go</span></div>
        </div>

        <div class="menu-title">MENU ADMIN</div>

        <nav class="menu">
            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="menu-icon">⌂</span>
                <span class="menu-label">Dashboard</span>
            </a>

            <a href="{{ route('admin.dashboard') }}#validasi">
                <span class="menu-icon">✓</span>
                <span class="menu-label">Validasi Penjual</span>
            </a>

            <a href="{{ route('admin.kategori.index') }}"
                class="{{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                <span class="menu-icon">▦</span>
                <span class="menu-label">Kelola Kategori</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="admin-info">
                <strong>{{ auth()->user()->name }}</strong><br>
                <small>Administrator</small>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout" type="submit">
                    ↪ <span class="logout-label">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <strong>Panel Administrasi</strong>

            <div>
                <strong>{{ auth()->user()->name }}</strong><br>
                <small>@yield('title', 'Dashboard Admin')</small>
            </div>
        </header>

        <section class="content">
            @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
            @endif

            @yield('content')
        </section>
    </main>

    @stack('scripts')
</body>

</html>