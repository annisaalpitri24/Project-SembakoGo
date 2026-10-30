<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SembakoGo</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #ffffff;
            display: flex;
        }

        /* BAGIAN KIRI */
        .left-panel {
            width: 45%;
            height: 100vh;
            position: relative;
            overflow: hidden;
            background-image: url('/images/beras.jpg');
            background-size: cover;
            background-position: center;
            color: white;
        }

        .left-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg,
                    rgba(0, 83, 62, 0.82) 0%,
                    rgba(0, 92, 68, 0.78) 45%,
                    rgba(0, 60, 45, 0.94) 100%);
            z-index: 1;
        }

        .left-logo {
            position: absolute;
            top: 35px;
            left: 38px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            font-weight: bold;
            z-index: 2;
        }

        .left-logo span span {
            color: #7bd9b8;
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

        .left-content {
            position: absolute;
            left: 38px;
            right: 50px;
            bottom: 180px;
            z-index: 2;
        }

        .line {
            width: 30px;
            height: 2px;
            background: #65d4b1;
            margin-bottom: 22px;
        }

        .left-content h1 {
            font-size: 34px;
            line-height: 1.12;
            font-weight: 700;
            margin-bottom: 15px;
            max-width: 450px;
        }

        .left-content p {
            font-size: 13px;
            line-height: 1.7;
            color: #c9e8de;
            max-width: 420px;
            margin-bottom: 22px;
        }

        .verified {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 12px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.06);
            color: #d4eee6;
            font-size: 11px;
        }

        .verified span {
            color: #62d5af;
        }

        .left-footer {
            position: absolute;
            left: 38px;
            right: 38px;
            bottom: 28px;
            padding-top: 13px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            display: flex;
            justify-content: space-between;
            color: #9bc8bb;
            font-size: 9px;
            z-index: 2;
        }

        /* BAGIAN KANAN */
        .login-right {
            width: 55%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #ffffff;
        }

        .login-box {
            width: 100%;
            max-width: 480px;
        }

        .welcome {
            color: #00865f;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .login-box h2 {
            font-size: 34px;
            color: #102c2a;
            margin-bottom: 12px;
        }

        .subtitle {
            color: #718096;
            font-size: 15px;
            margin-bottom: 35px;
        }

        /* PILIH ROLE */
        .role-tabs {
            display: flex;
            background: #f1f5f9;
            padding: 5px;
            border-radius: 13px;
            margin-bottom: 30px;
        }

        .role-tab {
            flex: 1;
            border: none;
            background: transparent;
            padding: 14px;
            border-radius: 9px;
            color: #668096;
            font-size: 15px;
            cursor: pointer;
            transition: 0.2s;
        }

        .role-tab.active {
            background: white;
            color: #007f5b;
            box-shadow: 0 2px 7px rgba(0, 0, 0, 0.08);
            font-weight: bold;
        }

        /* FORM */
        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            color: #263b4a;
            font-size: 14px;
            font-weight: bold;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            height: 53px;
            border: 1px solid #dce4eb;
            border-radius: 11px;
            padding: 0 18px;
            font-size: 15px;
            color: #263b4a;
            outline: none;
            transition: 0.2s;
        }

        .input-wrapper input:focus {
            border-color: #00865f;
            box-shadow: 0 0 0 3px rgba(0, 134, 95, 0.08);
        }

        .input-wrapper input::placeholder {
            color: #9aaabd;
        }

        .password-toggle {
            position: absolute;
            right: 17px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            cursor: pointer;
            font-size: 18px;
            color: #8ca0b3;
            z-index: 2;
            padding: 5px;
        }

        /* BUTTON LOGIN */
        .btn-login {
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
            margin-top: 5px;
        }

        .btn-login:hover {
            background: #006f4f;
            transform: translateY(-1px);
        }

        /* FOOTER */
        .register-text {
            text-align: center;
            margin-top: 25px;
            color: #718096;
            font-size: 14px;
        }

        .register-text a {
            color: #00865f;
            text-decoration: none;
            font-weight: bold;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        .terms {
            margin-top: 22px;
            text-align: center;
            color: #9aaabd;
            font-size: 12px;
            line-height: 1.6;
        }

        /* ERROR */
        .error-box {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
            border-radius: 10px;
            padding: 12px 15px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* TOMBOL KEMBALI KE LANDING PAGE */
        .back-home {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            margin-top: 18px;
            padding: 14px 20px;

            background: #f4faf7;
            border: 1px solid #d5e9df;
            border-radius: 12px;

            color: #00865f;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;

            transition: all 0.25s ease;
        }

        .back-home:hover {
            background: #00865f;
            color: #ffffff;
            border-color: #00865f;
            box-shadow: 0 5px 14px rgba(0, 134, 95, 0.18);
            transform: translateY(-2px);
        }

        .back-home .back-icon {
            font-size: 18px;
            transition: transform 0.25s ease;
        }

        .back-home:hover .back-icon {
            transform: translateX(-4px);
        }

        /* HILANGKAN IKON BAWAAN BROWSER */
        input::-ms-reveal,
        input::-ms-clear {
            display: none;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            body {
                display: block;
            }

            .left-panel {
                width: 100%;
                height: 420px;
            }

            .left-content {
                left: 30px;
                right: 30px;
                bottom: 90px;
            }

            .left-content h1 {
                font-size: 30px;
            }

            .left-logo {
                top: 25px;
                left: 30px;
            }

            .left-footer {
                left: 30px;
                right: 30px;
                bottom: 18px;
            }

            .login-right {
                width: 100%;
                min-height: auto;
                padding: 40px 25px;
            }
        }

        @media (max-width: 480px) {
            .left-panel {
                height: 350px;
            }

            .left-content h1 {
                font-size: 27px;
            }

            .login-box h2 {
                font-size: 28px;
            }

            .left-footer {
                font-size: 8px;
            }
        }
    </style>
</head>

<body>

    @php
    // Ambil role dari input sebelumnya atau URL
    $selectedRole = old('role', request()->query('role', 'pembeli'));

    // Pastikan role hanya pembeli atau penjual
    if (!in_array($selectedRole, ['pembeli', 'penjual'])) {
    $selectedRole = 'pembeli';
    }
    @endphp

    <!-- BAGIAN KIRI -->
    <section class="left-panel">

        <div class="left-overlay"></div>

        <div class="left-logo">
            <div class="logo-icon">🛒</div>
            <span>Sembako<span>Go</span></span>
        </div>

        <div class="left-content">
            <div class="line"></div>

            <h1>
                Warung sekitar, kini
                dalam genggaman.
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

        <div class="left-footer">
            <span>© {{ date('Y') }} SembakoGo</span>
            <span>Belanja dekat. Hidup mudah.</span>
        </div>

    </section>

    <!-- BAGIAN KANAN -->
    <section class="login-right">

        <div class="login-box">

            <div class="welcome">
                Selamat datang kembali
            </div>

            <h2>Masuk ke akunmu</h2>

            <p class="subtitle">
                Pilih peranmu dan lanjutkan aktivitas di SembakoGo.
            </p>

            <!-- PESAN ERROR -->
            @if ($errors->any())
            <div class="error-box">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <!-- PILIH ROLE -->
            <div class="role-tabs">

                <button
                    type="button"
                    class="role-tab {{ $selectedRole === 'pembeli' ? 'active' : '' }}"
                    id="pembeliTab"
                    onclick="pilihRole('pembeli')">
                    Pembeli
                </button>

                <button
                    type="button"
                    class="role-tab {{ $selectedRole === 'penjual' ? 'active' : '' }}"
                    id="penjualTab"
                    onclick="pilihRole('penjual')">
                    Penjual
                </button>

            </div>

            <!-- FORM LOGIN -->
            <form action="{{ route('login.store') }}" method="POST">

                @csrf

                <input
                    type="hidden"
                    name="role"
                    id="role"
                    value="{{ $selectedRole }}">

                <div class="form-group">

                    <label for="email">Email</label>

                    <div class="input-wrapper">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            required
                            autofocus>
                    </div>

                </div>

                <div class="form-group">

                    <label for="password">Password</label>

                    <div class="input-wrapper">

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required>

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                            aria-label="Tampilkan atau sembunyikan password">
                            👁
                        </button>

                    </div>

                </div>

                <button
                    type="submit"
                    class="btn-login"
                    id="loginButton">

                    {{ $selectedRole === 'penjual'
                        ? 'Masuk sebagai Penjual'
                        : 'Masuk sebagai Pembeli' }}

                </button>

            </form>

            <!-- LINK DAFTAR -->
            <div class="register-text">
                <a href="{{ route('home') }}" class="back-home">
                    <span class="back-icon">←</span>
                    <span>Kembali ke Landing Page</span>
                </a>
                <br>
                Belum punya akun?

                <br>

                <a
                    href="{{ $selectedRole === 'penjual'
                        ? route('register.penjual')
                        : route('register.pembeli') }}"
                    id="registerLink">

                    {{ $selectedRole === 'penjual'
                        ? 'Daftar sebagai Penjual'
                        : 'Daftar sebagai Pembeli' }}

                </a>

            </div>

            <div class="terms">
                Dengan masuk, kamu menyetujui ketentuan layanan
                SembakoGo.
            </div>



        </div>

    </section>

    <script>
        function pilihRole(role) {

            const pembeliTab = document.getElementById('pembeliTab');
            const penjualTab = document.getElementById('penjualTab');

            const roleInput = document.getElementById('role');
            const loginButton = document.getElementById('loginButton');
            const registerLink = document.getElementById('registerLink');

            // Simpan role yang dipilih pada input hidden.
            roleInput.value = role;

            if (role === 'pembeli') {

                pembeliTab.classList.add('active');
                penjualTab.classList.remove('active');

                loginButton.innerText = 'Masuk sebagai Pembeli';

                registerLink.innerText = 'Daftar sebagai Pembeli';
                registerLink.href = "{{ route('register.pembeli') }}";

            } else {

                penjualTab.classList.add('active');
                pembeliTab.classList.remove('active');

                loginButton.innerText = 'Masuk sebagai Penjual';

                registerLink.innerText = 'Daftar sebagai Penjual';
                registerLink.href = "{{ route('register.penjual') }}";

            }
        }

        function togglePassword() {

            const password = document.getElementById('password');

            if (password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        }
    </script>

</body>

</html>