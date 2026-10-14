
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sertifikasi</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #f4f6f9;
            color: #111827;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 16px;
        }

        .register-box {
            width: 100%;
            max-width: 700px;
            padding: 32px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .logo {
            width: 55px;
            height: 55px;
            margin: 0 auto 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #111827;
            color: white;
            border-radius: 13px;
            font-size: 24px;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            margin: 0;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            font-size: 13px;
            line-height: 1.6;
            margin: 10px 0 26px;
        }

        .section-title {
            font-size: 16px;
            margin: 25px 0 16px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e5e7eb;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0 18px;
        }

        .form-group {
            min-width: 0;
            margin-bottom: 16px;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
            color: #374151;
        }

        .required {
            color: #dc2626;
        }

        input,
        select,
        textarea {
            display: block;
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            color: #111827;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #111827;
            box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.07);
        }

        textarea {
            min-height: 85px;
            resize: vertical;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
        }

        .error-box {
            padding: 12px;
            margin-bottom: 18px;
            background: #fee2e2;
            border-radius: 8px;
            color: #991b1b;
            font-size: 13px;
            line-height: 1.7;
        }

        .submit-btn {
            width: 100%;
            padding: 13px;
            margin-top: 10px;
            border: none;
            border-radius: 8px;
            background: #111827;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #1f2937;
        }

        .login-link {
            text-align: center;
            color: #6b7280;
            font-size: 13px;
            margin: 22px 0 0;
        }

        .login-link a {
            color: #111827;
            font-weight: bold;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #9ca3af;
            font-size: 12px;
        }

        @media (max-width: 560px) {
            .register-box {
                padding: 22px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

<div class="register-box">

    <div class="logo">S</div>

    <h2>Register</h2>

    <p class="subtitle">
        Daftarkan akun dan lengkapi data peserta sertifikasi.
    </p>

    @if($errors->any())
        <div class="error-box">
            <strong>Periksa kembali data yang dimasukkan.</strong>
            @foreach($errors->all() as $error)
                <div>• {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <h3 class="section-title">Informasi Akun</h3>

        <div class="form-grid">

            <div class="form-group full-width">
                <label for="name">
                    Nama Lengkap <span class="required">*</span>
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap"
                    maxlength="255"
                    required
                >
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group full-width">
                <label for="email">
                    Email <span class="required">*</span>
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan alamat email"
                    maxlength="255"
                    required
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">
                    Password <span class="required">*</span>
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    minlength="8"
                    required
                >
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">
                    Konfirmasi Password <span class="required">*</span>
                </label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    minlength="8"
                    required
                >
            </div>

        </div>

        <h3 class="section-title">Data Peserta Sertifikasi</h3>

        <div class="form-grid">

            <div class="form-group">
                <label for="no_peserta">
                    Nomor Peserta <span class="required">*</span>
                </label>
                <input
                    type="text"
                    id="no_peserta"
                    name="no_peserta"
                    value="{{ old('no_peserta') }}"
                    placeholder="Contoh: P003"
                    maxlength="255"
                    required
                >
                @error('no_peserta')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nik">
                    NIK <span class="required">*</span>
                </label>
                <input
                    type="text"
                    id="nik"
                    name="nik"
                    value="{{ old('nik') }}"
                    placeholder="Maksimal 16 digit"
                    maxlength="255"
                    required
                >
                @error('nik')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">
                    Jenis Kelamin <span class="required">*</span>
                </label>
                {{-- Value disesuaikan dengan enum database 'L' dan 'P' --}}
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>
                @error('jenis_kelamin')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_telepon">Nomor Telepon</label>
                <input
                    type="tel"
                    id="no_telepon"
                    name="no_telepon"
                    value="{{ old('no_telepon') }}"
                    placeholder="Maksimal 13 digit"
                    maxlength="20"
                >
                @error('no_telepon')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group full-width">
                <label for="skema_id">
                    Skema Sertifikasi <span class="required">*</span>
                </label>
                <select id="skema_id" name="skema_id" required>
                    <option value="">-- Pilih Skema Sertifikasi --</option>
                    @foreach($skemas as $skema)
                        <option
                            value="{{ $skema->id }}"
                            {{ old('skema_id') == $skema->id ? 'selected' : '' }}>
                            {{ $skema->kode_skema }} - {{ $skema->nama_skema }}
                        </option>
                    @endforeach
                </select>
                @error('skema_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group full-width">
                <label for="alamat">Alamat</label>
                <textarea
                    id="alamat"
                    name="alamat"
                    placeholder="Masukkan alamat peserta"
                >{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <button type="submit" class="submit-btn">
            Daftar Akun
        </button>

    </form>

    <p class="login-link">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login di sini</a>
    </p>

    <div class="footer">
        Sistem Sertifikasi © {{ date('Y') }}
    </div>

</div>

</body>
</html>
