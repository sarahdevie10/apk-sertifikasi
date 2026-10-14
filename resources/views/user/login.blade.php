
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #111827;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
        }

        .login-box {
            background: white;
            padding: 38px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .profile-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 18px;
            background: #e5e7eb;
            color: #6b7280;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            text-align: center;
            margin: 0;
            font-size: 25px;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            font-size: 13px;
            line-height: 1.6;
            margin: 10px 0 27px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            margin-bottom: 20px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #111827;
            box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.08);
        }

        button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #111827;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #1f2937;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .links {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            line-height: 2;
            color: #6b7280;
        }

        .links a {
            color: #111827;
            font-weight: bold;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 22px;
            color: #9ca3af;
            font-size: 12px;
        }
    </style>
</head>

<body>

<div class="login-container">
    <div class="login-box">

        <div class="profile-icon">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="28" height="28" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor"
                 stroke-width="1.8" stroke-linecap="round"
                 stroke-linejoin="round">
                <circle cx="12" cy="8" r="4"></circle>
                <path d="M5 21c0-4 3-6 7-6s7 2 7 6"></path>
            </svg>
        </div>

        <h2>Login User</h2>

        <p class="subtitle">
            Aplikasi Pengelolaan Data Peserta Sertifikasi
        </p>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('user.login.process') }}" method="POST">
            @csrf

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                required
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Masukkan password"
                required
            >

            <button type="submit">Login User</button>
        </form>

        <div class="links">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar di sini</a>

            <br>

            Login sebagai admin?
            <a href="{{ route('login') }}">Login Admin</a>
        </div>

        <div class="footer">
            Sistem Sertifikasi © {{ date('Y') }}
        </div>

    </div>
</div>

</body>
</html>
