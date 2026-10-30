<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nama_produk }} - SembakoGo</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f8faf9;
            color: #102c2a;
        }

        .navbar {
            min-height: 78px;
            padding: 15px 7%;
            background: #006b4f;
            border-bottom: 1px solid #005940;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        /* LOGO SEMBAKOGO */
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            font-size: 21px;
            font-weight: bold;
            text-decoration: none;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            background: white;
            color: #00865f;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            border: none;
        }

        .logo span span {
            color: #7bd9b8;
        }

        .back-link {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        .container {
            max-width: 1100px;
            margin: 45px auto;
            padding: 0 24px;
        }

        .breadcrumb {
            color: #718096;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .breadcrumb a {
            color: #00865f;
            text-decoration: none;
        }

        .detail-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 35px;
            padding: 30px;
            background: white;
            border: 1px solid #e5eeea;
            border-radius: 18px;
        }

        .product-photo {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 13px;
            background: #eaf3ef;
        }

        .photo-placeholder {
            aspect-ratio: 1 / 1;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 13px;
            background: #eaf3ef;
            font-size: 90px;
        }

        .category {
            display: inline-block;
            padding: 7px 12px;
            background: #e1f7ef;
            color: #00865f;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        h1 {
            font-size: 32px;
            line-height: 1.3;
            margin-bottom: 15px;
            overflow-wrap: anywhere;
        }

        .price {
            color: #00865f;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 22px;
        }

        .meta {
            color: #526766;
            font-size: 14px;
            line-height: 1.9;
            margin-bottom: 22px;
        }

        .description-title {
            font-size: 17px;
            margin-bottom: 10px;
        }

        .description {
            color: #647776;
            line-height: 1.8;
            white-space: pre-line;
            overflow-wrap: anywhere;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            padding: 13px 20px;
            border-radius: 9px;
            background: #00865f;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .btn:hover {
            background: #006f4f;
        }

        @media (max-width: 750px) {
            .detail-card {
                grid-template-columns: 1fr;
                padding: 18px;
                gap: 25px;
            }

            h1 {
                font-size: 25px;
            }

            .price {
                font-size: 23px;
            }

            .container {
                margin: 25px auto;
                padding: 0 15px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="{{ route('home') }}" class="logo">
            <div class="logo-icon">🛒</div>
            <span>Sembako<span>Go</span></span>
        </a>


    </nav>

    <main class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            /
            <a href="{{ route('home', ['kategori' => $product->category_id]) }}#produk">
                {{ $product->category?->nama_kategori ?? 'Produk' }}
            </a>
            / {{ $product->nama_produk }}
        </div>

        <section class="detail-card">
            <div>
                @if ($product->foto)
                <img
                    class="product-photo"
                    src="{{ asset('storage/' . $product->foto) }}"
                    alt="{{ $product->nama_produk }}">
                @else
                <div class="photo-placeholder">🛒</div>
                @endif
            </div>

            <div>
                <span class="category">
                    {{ $product->category?->nama_kategori ?? 'Sembako' }}
                </span>

                <h1>{{ $product->nama_produk }}</h1>

                <div class="price">
                    Rp{{ number_format((float) $product->harga, 0, ',', '.') }}
                </div>

                <div class="meta">
                    <div>
                        <strong>Toko:</strong>
                        {{ $product->store?->nama_toko ?? 'Toko SembakoGo' }}
                    </div>

                    <div>
                        <strong>Stok:</strong>
                        @if ($product->stok > 0)
                        {{ $product->stok }} tersedia
                        @else
                        Stok habis
                        @endif
                    </div>
                </div>

                <h2 class="description-title">Deskripsi Produk</h2>

                <p class="description">{{ $product->deskripsi ?: 'Belum ada deskripsi untuk produk ini.' }}</p>

                <a href="{{ route('home') }}#produk" class="btn">
                    Lihat Produk Lain
                </a>
            </div>
        </section>
    </main>
</body>

</html>