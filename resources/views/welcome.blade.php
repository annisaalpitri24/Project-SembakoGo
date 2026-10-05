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
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f8faf9;
            color: #102c2a;
        }

        /* =========================
           NAVBAR
        ========================== */

        .navbar {
            height: 78px;
            background: white;
            border-bottom: 1px solid #edf1ef;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 7%;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #006b4f;
            font-size: 21px;
            font-weight: bold;
        }

        .logo-icon {
            width: 38px;
            height: 38px;

            background: #e1f7ef;
            color: #00865f;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #526766;
            font-size: 14px;
        }

        .nav-menu a:hover {
            color: #00865f;
        }

        .nav-login {
            padding: 11px 22px;
            border: 1px solid #00865f;
            border-radius: 9px;

            color: #00865f !important;
            font-weight: bold;
        }

        .nav-login:hover {
            background: #eaf8f3;
        }

        .nav-register {
            padding: 12px 22px;
            background: #00865f;
            color: white !important;

            border-radius: 9px;
            font-weight: bold;
        }

        .nav-register:hover {
            background: #006f4f;
        }

        /* =========================
           TOMBOL LOGIN ADMIN
        ========================== */

        .nav-admin {
            padding: 11px 20px;
            background: #102c2a;
            color: white !important;

            border-radius: 9px;
            font-weight: bold;

            transition: 0.2s;
        }

        .nav-admin:hover {
            background: #006b4f;
            color: white !important;
        }

        /* =========================
           HERO
        ========================== */

        .hero {
            min-height: calc(100vh - 78px);

            display: flex;
            align-items: center;

            padding: 70px 7%;

            background:
                radial-gradient(
                    circle at 90% 20%,
                    rgba(0, 134, 95, 0.08),
                    transparent 30%
                ),
                #f8faf9;
        }

        .hero-left {
            width: 55%;
        }

        .badge {
            display: inline-block;

            padding: 8px 15px;

            background: #e1f7ef;
            color: #00865f;

            border-radius: 30px;

            font-size: 13px;
            font-weight: bold;

            margin-bottom: 22px;
        }

        .hero h1 {
            font-size: 58px;
            line-height: 1.08;

            color: #102c2a;

            max-width: 650px;

            margin-bottom: 25px;
        }

        .hero h1 span {
            color: #00865f;
        }

        .hero-description {
            max-width: 570px;

            color: #647776;

            font-size: 17px;
            line-height: 1.8;

            margin-bottom: 35px;
        }

        /* =========================
           BUTTON HERO
        ========================== */

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 14px;

            margin-bottom: 40px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 15px 25px;

            background: #00865f;
            color: white;

            text-decoration: none;

            border-radius: 10px;

            font-size: 14px;
            font-weight: bold;

            box-shadow: 0 8px 20px rgba(0, 134, 95, 0.16);

            transition: 0.2s;
        }

        .btn-primary:hover {
            background: #006f4f;
            transform: translateY(-2px);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 15px 25px;

            background: white;
            color: #00865f;

            text-decoration: none;

            border: 1px solid #d4e4df;
            border-radius: 10px;

            font-size: 14px;
            font-weight: bold;

            transition: 0.2s;
        }

        .btn-secondary:hover {
            border-color: #00865f;
            background: #f1faf7;
        }

        /* =========================
           INFO
        ========================== */

        .hero-info {
            display: flex;
            gap: 35px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-icon {
            width: 38px;
            height: 38px;

            background: white;
            border: 1px solid #e1ebe7;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;
        }

        .info-text strong {
            display: block;

            color: #263b4a;
            font-size: 13px;

            margin-bottom: 3px;
        }

        .info-text span {
            color: #879592;
            font-size: 11px;
        }

        /* =========================
           HERO KANAN
        ========================== */

        .hero-right {
            width: 45%;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;
        }

        .hero-card {
            width: 390px;
            min-height: 400px;

            background: #006b4f;

            border-radius: 35px;

            padding: 35px;

            position: relative;
            overflow: hidden;

            box-shadow: 0 25px 60px rgba(0, 107, 79, 0.18);
        }

        .hero-circle-1 {
            width: 280px;
            height: 280px;

            border: 35px solid rgba(255, 255, 255, 0.06);

            border-radius: 50%;

            position: absolute;

            top: -150px;
            right: -100px;
        }

        .hero-circle-2 {
            width: 250px;
            height: 250px;

            border: 30px solid rgba(255, 255, 255, 0.06);

            border-radius: 50%;

            position: absolute;

            bottom: -140px;
            left: -100px;
        }

        .card-content {
            position: relative;
            z-index: 2;

            color: white;
        }

        .card-label {
            color: #a9ead4;

            font-size: 13px;
            font-weight: bold;

            letter-spacing: 1.5px;

            margin-bottom: 15px;
        }

        .card-content h2 {
            font-size: 30px;
            line-height: 1.2;

            margin-bottom: 15px;
        }

        .card-content p {
            color: #d2eee4;

            font-size: 14px;
            line-height: 1.7;

            margin-bottom: 25px;
        }

        .shopping-bag {
            width: 170px;
            height: 135px;

            background: #ffdf72;

            border-radius: 30px;

            margin: 25px auto 0;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 70px;

            transform: rotate(-4deg);

            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }

        /* =========================
           PILIHAN DAFTAR
        ========================== */

        .register-section {
            padding: 70px 7%;

            background: white;

            text-align: center;
        }

        .section-label {
            color: #00865f;

            font-size: 13px;
            font-weight: bold;

            letter-spacing: 1.5px;

            margin-bottom: 10px;
        }

        .register-section h2 {
            font-size: 34px;

            color: #102c2a;

            margin-bottom: 12px;
        }

        .section-description {
            color: #718096;

            font-size: 15px;

            margin-bottom: 35px;
        }

        .register-cards {
            display: flex;

            justify-content: center;

            gap: 20px;

            max-width: 900px;

            margin: auto;
        }

        .register-card {
            width: 330px;

            border: 1px solid #e0e9e5;

            border-radius: 17px;

            padding: 30px;

            text-align: left;

            background: white;

            transition: 0.2s;
        }

        .register-card:hover {
            transform: translateY(-4px);

            box-shadow: 0 15px 35px rgba(0, 80, 60, 0.08);
        }

        .register-icon {
            width: 50px;
            height: 50px;

            border-radius: 13px;

            background: #e1f7ef;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 24px;

            margin-bottom: 18px;
        }

        .register-card h3 {
            font-size: 20px;

            color: #163d39;

            margin-bottom: 10px;
        }

        .register-card p {
            color: #718096;

            font-size: 13px;

            line-height: 1.7;

            margin-bottom: 20px;
        }

        .card-link {
            color: #00865f;

            text-decoration: none;

            font-size: 13px;

            font-weight: bold;
        }

        .card-link:hover {
            text-decoration: underline;
        }

        /* =========================
           FOOTER
        ========================== */

        footer {
            padding: 25px 7%;

            background: #006b4f;

            color: #bce7d8;

            display: flex;

            align-items: center;
            justify-content: space-between;

            font-size: 12px;
        }

        footer strong {
            color: white;
        }

        /* =========================
           USER LOGIN
        ========================== */

        .user-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-name {
            color: #263b4a;
            font-size: 13px;
            font-weight: bold;
        }

        .logout-button {
            border: none;
            background: transparent;

            color: #d14b4b;

            cursor: pointer;

            font-size: 13px;
            font-weight: bold;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 950px) {

            .hero {
                flex-direction: column;
                gap: 60px;

                padding-top: 60px;
            }

            .hero-left,
            .hero-right {
                width: 100%;
            }

            .hero-left {
                text-align: center;
            }

            .hero h1 {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons,
            .hero-info {
                justify-content: center;
            }
        }

        @media (max-width: 700px) {

            .navbar {
                padding: 0 5%;
            }

            .nav-menu {
                gap: 8px;
            }

            .nav-menu a:not(.nav-login):not(.nav-register):not(.nav-admin) {
                display: none;
            }

            .nav-login,
            .nav-register,
            .nav-admin {
                padding: 9px 12px;
                font-size: 12px;
            }

            .hero {
                padding: 50px 5%;
            }

            .hero h1 {
                font-size: 42px;
            }

            .hero-info {
                flex-direction: column;
                align-items: center;
            }

            .register-cards {
                flex-direction: column;
                align-items: center;
            }

            .register-card {
                width: 100%;
                max-width: 400px;
            }

            footer {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
        }

        @media (max-width: 500px) {

            .hero-buttons {
                flex-direction: column;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
            }

            .hero-card {
                width: 100%;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: flex-end;
            }

            .nav-admin {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================== -->

    <nav class="navbar">

        <div class="logo">

            <div class="logo-icon">
                🛒
            </div>

            <span>
                Sembako<span style="color: #53b995;">Go</span>
            </span>

        </div>


        <div class="nav-menu">

            <a href="#daftar">
                Tentang
            </a>

            @auth

                <span class="user-name">
                    Halo, {{ auth()->user()->name }}
                </span>

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    style="display: inline;">

                    @csrf

                    <button
                        type="submit"
                        class="logout-button">

                        Logout

                    </button>

                </form>

            @else

                <a
                    href="{{ route('login') }}"
                    class="nav-login">

                    Masuk

                </a>

                <a
                    href="{{ route('register.pembeli') }}"
                    class="nav-register">

                    Daftar

                </a>

                <!-- LOGIN ADMIN -->
                <a
                    href="{{ route('admin.login') }}"
                    class="nav-admin">

                    Admin

                </a>

            @endauth

        </div>

    </nav>


    <!-- =========================
         HERO
    ========================== -->

    <section class="hero">


        <!-- KIRI -->

        <div class="hero-left">

            <div class="badge">
                🛒 PLATFORM BELANJA SEMBAKO
            </div>


            <h1>
                Kebutuhan harian,
                <span>selalu lebih dekat.</span>
            </h1>


            <p class="hero-description">

                SembakoGo membantu kamu menemukan berbagai
                kebutuhan sehari-hari dari penjual terpercaya.
                Belanja lebih mudah, praktis, dan nyaman.

            </p>


            <div class="hero-buttons">

                <a
                    href="{{ route('login') }}"
                    class="btn-primary">

                    Masuk ke SembakoGo →

                </a>


                <a
                    href="{{ route('register.pembeli') }}"
                    class="btn-secondary">

                    Daftar sebagai Pembeli

                </a>

            </div>


            <div class="hero-info">

                <div class="info-item">

                    <div class="info-icon">
                        🛍️
                    </div>

                    <div class="info-text">

                        <strong>
                            Produk Beragam
                        </strong>

                        <span>
                            Kebutuhan sehari-hari
                        </span>

                    </div>

                </div>


                <div class="info-item">

                    <div class="info-icon">
                        🏪
                    </div>

                    <div class="info-text">

                        <strong>
                            Penjual Terpercaya
                        </strong>

                        <span>
                            Toko telah divalidasi
                        </span>

                    </div>

                </div>

            </div>

        </div>


        <!-- KANAN -->

        <div class="hero-right">

            <div class="hero-card">

                <div class="hero-circle-1"></div>
                <div class="hero-circle-2"></div>


                <div class="card-content">

                    <div class="card-label">
                        SEMBAKOGO
                    </div>

                    <h2>
                        Belanja kebutuhan
                        jadi lebih simpel.
                    </h2>

                    <p>
                        Cari produk, pilih toko,
                        dan nikmati pengalaman belanja
                        yang lebih praktis.
                    </p>


                    <div class="shopping-bag">
                        🛍️
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================
         PILIHAN DAFTAR
    ========================== -->

    @guest

    <section
        class="register-section"
        id="daftar">

        <div class="section-label">
            BERGABUNG DENGAN SEMBAKOGO
        </div>


        <h2>
            Mau belanja atau berjualan?
        </h2>


        <p class="section-description">
            Pilih akun yang sesuai dengan kebutuhanmu.
        </p>


        <div class="register-cards">


            <!-- PEMBELI -->

            <div class="register-card">

                <div class="register-icon">
                    🛒
                </div>

                <h3>
                    Saya ingin Belanja
                </h3>

                <p>
                    Buat akun pembeli untuk mencari
                    berbagai kebutuhan sembako dan
                    melakukan pemesanan.
                </p>

                <a
                    href="{{ route('register.pembeli') }}"
                    class="card-link">

                    Daftar sebagai Pembeli →

                </a>

            </div>


            <!-- PENJUAL -->

            <div class="register-card">

                <div class="register-icon">
                    🏪
                </div>

                <h3>
                    Saya ingin Berjualan
                </h3>

                <p>
                    Daftarkan tokomu di SembakoGo
                    dan mulai menawarkan produk
                    kepada pembeli.
                </p>

                <a
                    href="{{ route('register.penjual') }}"
                    class="card-link">

                    Daftar sebagai Penjual →

                </a>

            </div>


        </div>

    </section>

    @endguest


    <!-- =========================
         FOOTER
    ========================== -->

    <footer>

        <div>
            © {{ date('Y') }}
            <strong>SembakoGo</strong>.
            Semua hak dilindungi.
        </div>

        <div>
            Belanja lebih mudah, lebih dekat.
        </div>

    </footer>

</body>

</html>