
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Sertifikasi</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f3f4f6;
            color: #111827;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            background: #ffffff;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #111827;
            font-size: 21px;
            font-weight: bold;
        }

        .logo-box {
            width: 36px;
            height: 36px;
            background: #111827;
            color: #ffffff;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 19px;
        }

        .login-btn {
            background: #111827;
            color: #ffffff;
            text-decoration: none;
            padding: 11px 22px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .login-btn:hover {
            background: #1f2937;
        }

        /* Konten utama */
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px 20px;
        }

        .welcome {
            max-width: 650px;
        }

        .welcome h1 {
            font-size: 36px;
            color: #111827;
            margin-bottom: 18px;
        }

        .welcome h1 span {
            color: #374151;
        }

        .welcome p {
            font-size: 15px;
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 27px;
        }

        .main-btn {
            display: inline-block;
            background: #111827;
            color: #ffffff;
            text-decoration: none;
            padding: 13px 23px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .main-btn:hover {
            background: #1f2937;
        }

        /* Footer */
        footer {
            background: #ffffff;
            border-top: 1px solid #e5e7eb;
            color: #8a94a6;
            text-align: center;
            padding: 18px;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 16px 5%;
            }

            .logo {
                font-size: 18px;
            }

            .welcome h1 {
                font-size: 28px;
            }

            .welcome p {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <div class="logo-box">S</div>
            <span>Sertifikasi</span>
        </div>

    </nav>

    <main class="content">
        <div class="welcome">
            <h1>Halo, Selamat <span>Datang!</span></h1>

            <p>
                Selamat datang di Aplikasi Pengelolaan Data Peserta
                Sertifikasi. Aplikasi ini digunakan untuk membantu admin
                dalam mengelola data peserta dan skema sertifikasi
                secara lebih terstruktur.
            </p>

            <a href="{{ route('login') }}" class="main-btn">
                Login →
            </a>
        </div>
    </main>

    <footer>
        Sistem Sertifikasi © {{ date('Y') }}
    </footer>

</body>
</html>
