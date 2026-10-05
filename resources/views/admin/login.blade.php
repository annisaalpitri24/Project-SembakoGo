<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - SembakoGo</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f8faf9;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;
        }

        .login-container {
            width: 100%;
            max-width: 1000px;
            min-height: 560px;

            background: white;

            border-radius: 25px;

            overflow: hidden;

            display: flex;

            box-shadow: 0 20px 60px rgba(0, 80, 60, 0.12);
        }

        /* =========================
           KIRI
        ========================== */

        .login-left {
            width: 45%;

            background: #006b4f;

            padding: 50px;

            color: white;

            display: flex;
            flex-direction: column;
            justify-content: center;

            position: relative;
            overflow: hidden;
        }

        .circle-one {
            position: absolute;

            width: 300px;
            height: 300px;

            border: 35px solid rgba(255, 255, 255, 0.06);

            border-radius: 50%;

            top: -150px;
            right: -100px;
        }

        .circle-two {
            position: absolute;

            width: 250px;
            height: 250px;

            border: 30px solid rgba(255, 255, 255, 0.06);

            border-radius: 50%;

            bottom: -130px;
            left: -100px;
        }

        .left-content {
            position: relative;
            z-index: 2;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;

            margin-bottom: 45px;
        }

        .logo span {
            color: #53b995;
        }

        .admin-icon {
            font-size: 55px;

            margin-bottom: 20px;
        }

        .login-left h1 {
            font-size: 35px;
            line-height: 1.2;

            margin-bottom: 18px;
        }

        .login-left p {
            color: #d2eee4;

            font-size: 14px;
            line-height: 1.8;

            max-width: 350px;
        }

        /* =========================
           KANAN
        ========================== */

        .login-right {
            width: 55%;

            padding: 55px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-form {
            width: 100%;
            max-width: 400px;
        }

        .login-form h2 {
            color: #102c2a;

            font-size: 30px;

            margin-bottom: 8px;
        }

        .subtitle {
            color: #718096;

            font-size: 14px;

            margin-bottom: 35px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            color: #263b4a;

            font-size: 13px;
            font-weight: bold;

            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;

            padding: 14px 15px;

            border: 1px solid #d8e4df;

            border-radius: 9px;

            font-size: 14px;

            outline: none;
        }

        .form-group input:focus {
            border-color: #00865f;

            box-shadow: 0 0 0 3px rgba(0, 134, 95, 0.08);
        }

        .error {
            background: #fff1f1;

            color: #c0392b;

            border: 1px solid #f3caca;

            padding: 12px;

            border-radius: 8px;

            font-size: 13px;

            margin-bottom: 20px;
        }

        .login-button {
            width: 100%;

            padding: 15px;

            border: none;

            border-radius: 9px;

            background: #00865f;

            color: white;

            font-size: 14px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }

        .login-button:hover {
            background: #006f4f;
        }

        .back-home {
            display: block;

            text-align: center;

            margin-top: 22px;

            color: #00865f;

            text-decoration: none;

            font-size: 13px;
        }

        .back-home:hover {
            text-decoration: underline;
        }

        .admin-note {
            margin-top: 25px;

            padding: 12px;

            background: #f1faf7;

            border-radius: 8px;

            color: #52706a;

            font-size: 12px;

            line-height: 1.6;

            text-align: center;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 750px) {

            body {
                padding: 15px;
            }

            .login-container {
                flex-direction: column;
            }

            .login-left,
            .login-right {
                width: 100%;
            }

            .login-left {
                padding: 40px;
            }

            .login-right {
                padding: 40px 30px;
            }

            .login-left h1 {
                font-size: 28px;
            }

            .logo {
                margin-bottom: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <!-- =========================
             KIRI
        ========================== -->

        <div class="login-left">

            <div class="circle-one"></div>
            <div class="circle-two"></div>

            <div class="left-content">

                <div class="logo">
                    Sembako<span>Go</span>
                </div>

                <div class="admin-icon">
                    👨‍💼
                </div>

                <h1>
                    Selamat Datang,
                    Admin!
                </h1>

                <p>
                    Kelola SembakoGo dengan mudah.
                    Pantau penjual, validasi toko,
                    dan kelola sistem dari dashboard admin.
                </p>

            </div>

        </div>


        <!-- =========================
             KANAN
        ========================== -->

        <div class="login-right">

            <div class="login-form">

                <h2>
                    Login Admin
                </h2>

                <p class="subtitle">
                    Masuk menggunakan akun administrator.
                </p>


                @if ($errors->any())

                    <div class="error">

                        {{ $errors->first() }}

                    </div>

                @endif


                <form
                    action="{{ route('admin.login.process') }}"
                    method="POST">

                    @csrf


                    <div class="form-group">

                        <label for="email">
                            Email Admin
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email admin"
                            required
                            autofocus>

                    </div>


                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required>

                    </div>


                    <button
                        type="submit"
                        class="login-button">

                        Masuk sebagai Admin

                    </button>

                </form>


                <div class="admin-note">
                    Akun admin dibuat oleh sistem.
                    Tidak tersedia pendaftaran akun admin.
                </div>


                <a
                    href="{{ route('home') }}"
                    class="back-home">

                    ← Kembali ke SembakoGo

                </a>

            </div>

        </div>

    </div>

</body>

</html>