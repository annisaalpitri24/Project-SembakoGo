<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SembakoGo - Kebutuhan Harian Lebih Dekat</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Arial, Helvetica, sans-serif;
        }

        :root {
            --green: #00865f;
            --green-dark: #006b4f;
            --green-light: #e1f7ef;
            --text-dark: #2d3748;
            --text-muted: #718096;
            --border: #e2e8f0;
            --bg-page: #f8f9fa;
            --bg-white: #ffffff;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--bg-page);
            color: var(--text-dark);
        }

        /* TOP NAVBAR (GREEN) */
        .navbar {
            min-height: 70px;
            background: var(--green);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            padding: 12px 7%;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: #ffffff;
            font-size: 24px;
            font-weight: 800;
            text-decoration: none;
            white-space: nowrap;
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            background: #ffffff;
            color: #00865f;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .logo-highlight {
            color: #53b995;
        }

        /* SEARCH BAR */
        .search-container {
            flex: 1;
            max-width: 700px;
            display: flex;
            background: #fff;
            border-radius: 8px;
            padding: 4px;
            margin: 0 20px;
        }

        .search-container input {
            flex: 1;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
        }

        .search-container button {
            background: var(--green);
            border: none;
            border-radius: 6px;
            width: 45px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        /* RIGHT NAV */
        .nav-menu {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
            flex-wrap: wrap;
            color: #fff;
            font-size: 14px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
        }

        .nav-menu a:hover {
            opacity: 0.8;
        }

        .nav-divider {
            width: 1px;
            height: 20px;
            background: rgba(255, 255, 255, 0.4);
        }

        .nav-cart {
            position: relative;
            font-size: 20px;
        }

        .nav-cart span {
            position: absolute;
            top: -8px;
            right: -10px;
            background: #fff;
            color: var(--green);
            font-size: 11px;
            font-weight: bold;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* SUB NAVBAR (WHITE) */
        .sub-navbar {
            background: #fff;
            padding: 0 7%;
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--border);
        }

        .sub-nav-item {
            padding: 16px 20px;
            text-decoration: none;
            color: var(--text-dark);
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sub-nav-item.active {
            color: var(--green);
            border-bottom: 2px solid var(--green);
        }

        .sub-nav-item:hover {
            color: var(--green);
        }

        /* HERO BANNER */
        .hero {
            padding: 20px 7%;
        }

        .hero-banner {
            background: var(--green-light);
            /* Warna hijau muda */
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 40px 50px;
            position: relative;
            overflow: hidden;
            min-height: 350px;
        }

        .hero-left {
            width: 50%;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--green);
            color: #fff;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 42px;
            line-height: 1.1;
            color: var(--text-dark);
            margin-bottom: 15px;
            font-weight: 800;
        }

        .hero h1 span {
            color: var(--green);
        }

        .hero p {
            color: #4a5568;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 30px;
            max-width: 450px;
        }

        .hero-info {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: var(--green);
        }

        .info-text strong {
            display: block;
            font-size: 13px;
            color: var(--text-dark);
        }

        .info-text span {
            font-size: 11px;
            color: var(--text-muted);
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--green);
            color: #fff;
            padding: 14px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: 0.2s;
        }

        .btn-primary:hover {
            background: var(--green-dark);
        }

        .hero-right {
            width: 50%;
            position: relative;
            display: flex;
            justify-content: flex-end;
        }

        .hero-image-container {
            width: 100%;
            height: 350px;
            background: url('https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') no-repeat center right;
            background-size: cover;
            border-radius: 0 16px 16px 0;
            position: absolute;
            right: -50px;
            top: -40px;
            bottom: -40px;
            mask-image: linear-gradient(to right, transparent, black 20%);
            -webkit-mask-image: linear-gradient(to right, transparent, black 20%);
            z-index: 1;
        }

        .hero-sticker {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--green);
            color: #fff;
            padding: 15px 25px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 16px;
            transform: rotate(-5deg);
            z-index: 3;
            box-shadow: 0 4px 10px rgba(0, 134, 95, 0.3);
        }

        /* KATEGORI */
        .category-section {
            padding: 0 7% 30px;
        }

        .category-list {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            gap: 12px;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid var(--border);
        }

        .category-chip {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 5px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 8px;
            text-decoration: none;
            color: var(--text-dark);
            font-size: 12px;
            font-weight: 500;
            text-align: center;
            transition: 0.2s;
        }

        .category-chip:hover,
        .category-chip.active {
            border-color: var(--green);
            color: var(--green);
            background: var(--green-light);
        }

        /* PRODUK SECTION */
        .catalog-section {
            padding: 20px 7% 60px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .section-title .icon {
            color: var(--green);
            font-size: 24px;
        }

        .see-all {
            color: var(--green);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* GRID PRODUK */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
        }

        .product-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            transition: 0.2s;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .product-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: var(--green);
            color: #fff;
            font-size: 10px;
            font-weight: bold;
            padding: 4px 8px;
            border-radius: 4px;
            z-index: 2;
        }

        .product-badge.diskon {
            background: #e53e3e;
        }

        .product-photo-link {
            display: block;
            background: #f8f9fa;
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }

        .product-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .product-image-placeholder {
            font-size: 40px;
            color: #cbd5e0;
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            line-height: 1.4;
            margin-bottom: 8px;
            height: 36px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .product-price {
            font-size: 16px;
            font-weight: 800;
            color: var(--green);
            margin-bottom: 8px;
        }

        .price-unit {
            font-size: 11px;
            font-weight: normal;
            color: var(--text-muted);
        }

        .price-old {
            font-size: 11px;
            color: var(--text-muted);
            text-decoration: line-through;
            margin-left: 5px;
            font-weight: normal;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            color: var(--text-muted);
            margin-bottom: 12px;
        }

        .product-rating .star {
            color: #f6ad55;
        }

        .product-link {
            display: block;
            text-align: center;
            background: var(--green-light);
            color: var(--green);
            padding: 8px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            transition: 0.2s;
        }

        .product-link:hover {
            background: var(--green);
            color: #fff;
        }

        .empty-products {
            grid-column: 1 / -1;
            padding: 40px;
            text-align: center;
            background: #fff;
            border-radius: 12px;
            border: 1px dashed var(--border);
        }

        /* FOOTER */
        footer {
            padding: 30px 7%;
            background: #fff;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: var(--text-muted);
        }

        footer strong {
            color: var(--green);
        }

        /* RESPONSIVE */
        @media (max-width: 1200px) {
            .product-grid {
                grid-template-columns: repeat(4, 1fr);
            }

            .category-list {
                grid-template-columns: repeat(5, 1fr);
            }
        }

        @media (max-width: 900px) {
            .hero-banner {
                flex-direction: column;
                padding: 30px;
            }

            .hero-left {
                width: 100%;
                margin-bottom: 30px;
            }

            .hero-right {
                width: 100%;
                display: none;
            }

            .product-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .navbar {
                flex-wrap: wrap;
            }

            .search-container {
                order: 3;
                width: 100%;
                margin: 10px 0 0 0;
                max-width: 100%;
            }
        }

        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .category-list {
                grid-template-columns: repeat(3, 1fr);
            }

            .hero h1 {
                font-size: 28px;
            }

            .hero-info {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- TOP NAVBAR -->
    <nav class="navbar">
        <a class="logo" href="{{ route('home') }}">
            <span class="logo-icon">🛒</span>
            <span>Sembako<span class="logo-highlight">Go</span></span>
        </a>

        <!-- SEARCH BAR -->
        <div class="search-container">
            <input type="text" placeholder="Cari produk sembako, sayur, buah, dan lainnya...">
            <button>🔍</button>
        </div>

        <!-- RIGHT MENU -->
        <div class="nav-menu">
            @auth
            <div class="user-area" style="display:flex; align-items:center; gap:15px;">
                <span style="font-weight:bold;">Halo, {{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:#fff; cursor:pointer; font-size:14px;">Logout</button>
                </form>
            </div>
            @else
            <a href="{{ route('login') }}">👤 Masuk</a>
            <a href="{{ route('register.pembeli') }}">Daftar</a>
            <a href="{{ route('admin.login') }}">Admin</a>
            <div class="nav-divider"></div>
            @endauth
            <a href="#" class="nav-cart">🛒 <span>0</span></a>
        </div>
    </nav>

    <!-- SUB NAVBAR -->
    <div class="sub-navbar">

        <a href="#beranda" class="sub-nav-item active">Beranda</a>
        <a href="#produk" class="sub-nav-item">Produk</a>

        <a href="#daftar" class="sub-nav-item">Tentang Kami</a>
    </div>

    <!-- HERO SECTION -->
    <section class="hero" id="beranda">
        <div class="hero-banner">
            <div class="hero-left">
                <div class="hero-badge">
                    🚚 Belanja Sembako
                </div>
                <h1>Lebih Mudah,<br><span>Lebih Hemat!</span></h1>
                <p>Semua kebutuhan harian Anda tersedia di SembakoGo</p>

                <div class="hero-info">
                    <div class="info-item">
                        <div class="info-icon">✔️</div>
                        <div class="info-text">
                            <strong>Produk</strong>
                            <span>Berkualitas</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">🚀</div>
                        <div class="info-text">
                            <strong>Pengiriman</strong>
                            <span>Cepat</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">💰</div>
                        <div class="info-text">
                            <strong>Harga</strong>
                            <span>Terbaik</span>
                        </div>
                    </div>
                </div>

                <a href="#produk" class="btn-primary">Belanja Sekarang →</a>
            </div>

            <div class="hero-right">
                <div class="hero-sticker">Sembako Lengkap<br>Harga Bersaing</div>
                <div class="hero-image-container"></div>
            </div>
        </div>
    </section>

    <!-- KATEGORI SECTION -->
    <section class="category-section" id="kategori">
        <div class="category-list">
            <a href="{{ route('home') }}#produk" class="category-chip {{ !request()->filled('kategori') ? 'active' : '' }}">Semua Produk</a>

            @foreach ($categories as $category)
            <a href="{{ route('home', ['kategori' => $category->id]) }}#produk" class="category-chip {{ (string) request('kategori') === (string) $category->id ? 'active' : '' }}">
                {{ $category->nama_kategori }}
            </a>
            @endforeach
        </div>
    </section>

    <!-- PRODUK SECTION -->
    <section class="catalog-section" id="produk">

        <div class="section-header">
            <div class="section-title">
                <span class="icon">🔥</span> Produk Pilihan
            </div>

        </div>

        <div class="product-grid">
            @forelse ($products as $product)
            <article class="product-card">

                <a href="{{ route('produk.detail', $product->id) }}" class="product-photo-link">
                    @if ($product->foto)
                    <img class="product-image"
                        src="{{ asset('storage/' . $product->foto) }}"
                        alt="{{ $product->nama_produk }}"
                        loading="lazy">
                    @else
                    <div class="product-image-placeholder">🛒</div>
                    @endif
                </a>

                <div class="product-info">
                    <h3 class="product-name">{{ $product->nama_produk }}</h3>

                    <div class="product-price">
                        Rp{{ number_format($product->harga, 0, ',', '.') }}
                        <span class="price-unit">/ {{ $product->satuan }}</span>
                    </div>

                    <div class="product-rating">
                        <span>🏪</span>
                        <span>
                            {{ $product->store->nama_toko ?? 'Nama toko belum tersedia' }}
                        </span>
                    </div>

                    @if ($product->stok > 0)
                    <a href="{{ route('produk.detail', $product->id) }}" class="product-link">
                        Lihat Detail
                    </a>
                    @else
                    <a href="{{ route('produk.detail', $product->id) }}"
                        class="product-link"
                        style="background:#e2e8f0; color:#718096;">
                        Stok Habis
                    </a>
                    @endif
                </div>
            </article>

            @empty
            <div class="empty-products">
                <div style="font-size:40px; margin-bottom:12px;">🛒</div>
                <h3>Produk belum tersedia</h3>
                <p style="margin-top:8px; color:#718096;">
                    Coba pilih kategori lain atau kunjungi kembali nanti.
                </p>
            </div>
            @endforelse
        </div>

        @if ($products->hasPages())
        <div class="pagination-area" style="margin-top:30px;">
            {{ $products->links() }}
        </div>
        @endif

    </section>

    <!-- DAFTAR SECTION -->
    @guest
    <section class="register-section" id="daftar" style="padding: 40px 7%; text-align: center; background: #fff; border-top: 1px solid #e2e8f0;">
        <div style="color: var(--green); font-size: 12px; font-weight: bold; letter-spacing: 1.3px; margin-bottom: 8px;">BERGABUNG DENGAN SEMBAKOGO</div>
        <h2 style="font-size: 28px; color: var(--text-dark); margin-bottom: 10px;">Mau belanja atau berjualan?</h2>
        <p style="color: var(--text-muted); font-size: 14px; margin-bottom: 30px;">Pilih akun yang sesuai dengan kebutuhanmu.</p>

        <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
            <div style="border: 1px solid var(--border); padding: 25px; border-radius: 12px; width: 300px; text-align: left;">
                <div style="font-size: 24px; margin-bottom: 10px;">🛒</div>
                <h3 style="margin-bottom: 10px; color: var(--text-dark);">Saya ingin Belanja</h3>
                <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 15px; line-height: 1.5;">Buat akun pembeli untuk mencari berbagai kebutuhan sembako dan melakukan pemesanan.</p>
                <a href="{{ route('register.pembeli') }}" style="color: var(--green); text-decoration: none; font-weight: bold; font-size: 13px;">Daftar sebagai Pembeli →</a>
            </div>
            <div style="border: 1px solid var(--border); padding: 25px; border-radius: 12px; width: 300px; text-align: left;">
                <div style="font-size: 24px; margin-bottom: 10px;">🏪</div>
                <h3 style="margin-bottom: 10px; color: var(--text-dark);">Saya ingin Berjualan</h3>
                <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 15px; line-height: 1.5;">Daftarkan tokomu di SembakoGo dan mulai menawarkan produk kepada pembeli.</p>
                <a href="{{ route('register.penjual') }}" style="color: var(--green); text-decoration: none; font-weight: bold; font-size: 13px;">Daftar sebagai Penjual →</a>
            </div>
        </div>
    </section>
    @endguest

    <!-- FOOTER -->
    <footer>
        <div>
            © {{ date('Y') }} <strong>SembakoGo</strong>. Semua hak dilindungi.
        </div>
        <div>
            Belanja lebih mudah, lebih dekat.
        </div>
    </footer>

</body>

</html>