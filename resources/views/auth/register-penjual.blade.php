<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Penjual - SembakoGo</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            margin: 0;
            background: #ffffff;

            display: flex;
            align-items: stretch;
        }

        /* =========================
           BAGIAN KIRI
        ========================== */

        .register-left {
            width: 45%;
            min-height: 100vh;
            height: auto;

            position: sticky;
            top: 0;
            align-self: flex-start;

            overflow: hidden;

            background-image: url('/images/beras.jpg');
            background-size: cover;
            background-position: center;

            color: white;
        }


        /* Overlay hijau */

        .left-overlay {
            position: absolute;
            inset: 0;

            background:
                linear-gradient(180deg,
                    rgba(0, 91, 68, 0.82) 0%,
                    rgba(0, 91, 68, 0.80) 50%,
                    rgba(0, 55, 42, 0.95) 100%);

            z-index: 1;
        }


        /* Logo */

        .left-logo {
            position: absolute;

            top: 34px;
            left: 38px;

            display: flex;
            align-items: center;

            gap: 10px;

            font-size: 16px;
            font-weight: bold;

            z-index: 2;
        }

        .left-logo>span>span {
            color: #79d8b7;
        }


        .logo-icon {
            width: 30px;
            height: 30px;

            background: white;

            color: #00865f;

            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 15px;
        }


        /* Konten kiri */

        .left-content {
            position: absolute;

            left: 38px;
            right: 45px;

            bottom: 175px;

            z-index: 2;
        }


        /* Garis kecil */

        .left-line {
            width: 30px;
            height: 2px;

            background: #65d4b1;

            margin-bottom: 22px;
        }


        /* Judul */

        .left-content h1 {
            font-size: 36px;

            line-height: 1.12;

            font-weight: 700;

            max-width: 440px;

            margin-bottom: 17px;
        }


        /* Deskripsi */

        .left-content p {
            max-width: 420px;

            color: #c9e8de;

            font-size: 13px;

            line-height: 1.7;

            margin-bottom: 22px;
        }


        /* Badge */

        .verified {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 7px 12px;

            border: 1px solid rgba(255, 255, 255, 0.25);

            border-radius: 20px;

            background: rgba(255, 255, 255, 0.07);

            color: #d4eee6;

            font-size: 11px;
        }

        .verified span {
            color: #62d5af;
        }


        /* Footer */

        .left-footer {
            position: absolute;

            left: 38px;
            right: 38px;
            bottom: 27px;

            padding-top: 13px;

            border-top: 1px solid rgba(255, 255, 255, 0.15);

            display: flex;

            justify-content: space-between;

            color: #9bc8bb;

            font-size: 9px;

            z-index: 2;
        }

        /* =========================
           BAGIAN KANAN
        ========================== */

        .register-right {
            width: 55%;
            min-height: 100vh;

            padding: 40px;

            background: #ffffff;

            display: flex;
            align-items: flex-start;
            justify-content: center;

            overflow: visible;
        }

        .register-container {
            width: 100%;
            max-width: 720px;
            margin: 0 auto;
        }

        /* =========================
           HEADER
        ========================== */

        .back-link {
            display: inline-block;
            color: #00865f;
            text-decoration: none;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .small-heading {
            color: #00865f;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .register-container h2 {
            color: #102c2a;
            font-size: 34px;
            margin-bottom: 10px;
        }

        .description {
            color: #718096;
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        /* =========================
           ERROR
        ========================== */

        .error-box {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
            border-radius: 10px;
            padding: 12px 15px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.7;
        }

        /* =========================
           FORM CARD
        ========================== */

        .form-card {
            border: 1px solid #dfe7ed;
            border-radius: 17px;
            padding: 22px 18px 20px;
            margin-bottom: 18px;
            box-shadow: 0 3px 10px rgba(16, 44, 42, 0.04);
            background: white;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #163d39;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 22px;
        }

        .number {
            width: 23px;
            height: 23px;
            border-radius: 50%;
            background: #d9f7eb;
            color: #00865f;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .number.store {
            background: #fff1c7;
            color: #9b7300;
        }

        /* =========================
           FORM GRID
        ========================== */

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 17px 13px;
        }

        .form-group {
            width: 100%;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            color: #263b4a;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .required {
            color: #e25555;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            border: 1px solid #dce5eb;
            border-radius: 10px;
            background: white;
            padding: 0 14px;
            font-size: 13px;
            color: #263b4a;
            outline: none;
            transition: 0.2s;
        }

        .form-group input {
            height: 47px;
        }

        .form-group textarea {
            min-height: 75px;
            padding-top: 13px;
            padding-bottom: 13px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #00865f;
            box-shadow: 0 0 0 3px rgba(0, 134, 95, 0.07);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #9aaabd;
        }

        /* =========================
           PASSWORD
        ========================== */

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 45px;
        }

        .show-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            cursor: pointer;
            font-size: 16px;
            color: #8ca0b3;
        }

        /* =========================
           BUTTON
        ========================== */

        .btn-register {
            width: 100%;
            height: 53px;
            border: none;
            border-radius: 11px;
            background: #00865f;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            box-shadow: 0 5px 12px rgba(0, 134, 95, 0.14);
        }

        .btn-register:hover {
            background: #006f4f;
            transform: translateY(-1px);
        }

        /* =========================
           KETENTUAN
        ========================== */

        .terms {
            text-align: center;
            color: #9aaabd;
            font-size: 12px;
            line-height: 1.6;
            margin-top: 15px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {

            body {
                display: block;
            }

            .register-left {
                width: 100%;
                min-height: auto;
                padding: 30px;
            }

            .left-content {
                margin-top: 45px;
            }

            .left-content h1 {
                font-size: 36px;
            }

            .shopping-icon {
                margin-top: 35px;
                width: 140px;
                height: 110px;
                font-size: 55px;
            }

            .copyright {
                margin-top: 40px;
            }

            .register-right {
                width: 100%;
                min-height: auto;
                padding: 40px 25px;
            }
        }

        @media (max-width: 650px) {

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .register-right {
                padding: 30px 18px;
            }

            .form-card {
                padding: 18px 14px;
            }
        }
    </style>
</head>


<body>

    <!-- =========================
         BAGIAN KIRI
    ========================== -->

    <section class="register-left">

        <!-- Overlay -->
        <div class="left-overlay"></div>

        <!-- Logo -->
        <div class="left-logo">

            <div class="logo-icon">
                🛒
            </div>

            <span>
                Sembako<span>Go</span>
            </span>

        </div>


        <!-- Konten -->
        <div class="left-content">

            <div class="left-line"></div>

            <h1>
                Warung sekitar,
                kini dalam genggaman.
            </h1>

            <p>
                Belanja kebutuhan sehari-hari dari
                penjual lokal yang kamu kenal dan percaya.
            </p>

            <div class="verified">

                <span>●</span>

                Mitra lokal terverifikasi

            </div>

        </div>


        <!-- Footer -->
        <div class="left-footer">

            <span>
                © {{ date('Y') }} SembakoGo
            </span>

            <span>
                Belanja dekat. Hidup mudah.
            </span>

        </div>

    </section>


    <!-- =========================
         BAGIAN KANAN
    ========================== -->

    <section class="register-right">

        <div class="register-container">


            <!-- KEMBALI -->

            <a
                href="{{ route('login') }}"
                class="back-link">

                ← Kembali ke Login

            </a>


            <!-- JUDUL -->

            <div class="small-heading">
                Mulai berjualan
            </div>


            <h2>
                Daftar sebagai Penjual
            </h2>


            <p class="description">
                Lengkapi data diri dan tokomu.
                Proses pendaftaran hanya membutuhkan beberapa menit.
            </p>


            <!-- =========================
                 ERROR VALIDASI
            ========================== -->

            @if ($errors->any())

            <div class="error-box">

                @foreach ($errors->all() as $error)

                <div>
                    • {{ $error }}
                </div>

                @endforeach

            </div>

            @endif


            <!-- =========================
                 FORM
            ========================== -->

            <form
                action="{{ route('register.penjual.store') }}"
                method="POST">

                @csrf


                <!-- =========================
                     DATA PEMILIK
                ========================== -->

                <div class="form-card">

                    <div class="section-title">

                        <span class="number">
                            1
                        </span>

                        <span>
                            Data Pemilik
                        </span>

                    </div>


                    <div class="form-grid">


                        <!-- NAMA LENGKAP -->

                        <div class="form-group">

                            <label for="name">

                                Nama Lengkap
                                <span class="required">*</span>

                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Nama sesuai identitas"
                                required>

                        </div>


                        <!-- EMAIL -->

                        <div class="form-group">

                            <label for="email">

                                Email
                                <span class="required">*</span>

                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                required>

                        </div>


                        <!-- NOMOR HP -->

                        <div class="form-group">

                            <label for="no_hp">

                                Nomor HP
                                <span class="required">*</span>

                            </label>

                            <input
                                type="text"
                                id="no_hp"
                                name="no_hp"
                                value="{{ old('no_hp') }}"
                                placeholder="Contoh: 081234567890"
                                required>

                        </div>


                        <!-- PASSWORD -->

                        <div class="form-group">

                            <label for="password">

                                Password
                                <span class="required">*</span>

                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Minimal 8 karakter"
                                    required>

                                <button
                                    type="button"
                                    class="show-password"
                                    onclick="togglePassword('password', this)">

                                    👁

                                </button>

                            </div>

                        </div>


                        <!-- KONFIRMASI PASSWORD -->

                        <div class="form-group full">

                            <label for="password_confirmation">

                                Konfirmasi Password
                                <span class="required">*</span>

                            </label>

                            <div class="password-wrapper">

                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="Ulangi password"
                                    required>

                                <button
                                    type="button"
                                    class="show-password"
                                    onclick="togglePassword('password_confirmation', this)">

                                    👁

                                </button>

                            </div>

                        </div>


                    </div>

                </div>


                <!-- =========================
                     DATA TOKO
                ========================== -->

                <div class="form-card">

                    <div class="section-title">

                        <span class="number store">
                            2
                        </span>

                        <span>
                            Data Toko
                        </span>

                    </div>


                    <div class="form-grid">


                        <!-- NAMA TOKO -->

                        <div class="form-group">

                            <label for="nama_toko">

                                Nama Toko
                                <span class="required">*</span>

                            </label>

                            <input
                                type="text"
                                id="nama_toko"
                                name="nama_toko"
                                value="{{ old('nama_toko') }}"
                                placeholder="Contoh: Toko Berkah Jaya"
                                required>

                        </div>


                        <!-- NOMOR HP TOKO -->

                        <div class="form-group">

                            <label for="no_hp_toko">

                                Nomor HP Toko
                                <span class="required">*</span>

                            </label>

                            <input
                                type="text"
                                id="no_hp_toko"
                                name="no_hp_toko"
                                value="{{ old('no_hp_toko') }}"
                                placeholder="Nomor aktif toko"
                                required>

                        </div>


                        <!-- ALAMAT TOKO -->

                        <div class="form-group full">

                            <label for="alamat_toko">

                                Alamat Toko
                                <span class="required">*</span>

                            </label>

                            <textarea
                                id="alamat_toko"
                                name="alamat_toko"
                                placeholder="Tulis alamat lengkap toko"
                                required>{{ old('alamat_toko') }}</textarea>

                        </div>


                        <!-- DESKRIPSI TOKO -->

                        <div class="form-group full">

                            <label for="deskripsi">

                                Deskripsi Toko

                            </label>

                            <textarea
                                id="deskripsi"
                                name="deskripsi"
                                placeholder="Ceritakan produk dan keunggulan tokomu">{{ old('deskripsi') }}</textarea>

                        </div>


                    </div>

                </div>


                <!-- =========================
                     BUTTON DAFTAR
                ========================== -->

                <button
                    type="submit"
                    class="btn-register">

                    Daftar sebagai Penjual

                </button>


                <!-- KETENTUAN -->

                <div class="terms">

                    Dengan mendaftar, kamu menyetujui
                    ketentuan layanan SembakoGo.

                </div>


            </form>

        </div>

    </section>


    <!-- =========================
         JAVASCRIPT
    ========================== -->

    <script>
        function togglePassword(inputId, button) {

            const input = document.getElementById(inputId);

            if (input.type === 'password') {

                input.type = 'text';

                button.innerText = '🙈';

            } else {

                input.type = 'password';

                button.innerText = '👁';

            }

        }
    </script>

</body>

</html>