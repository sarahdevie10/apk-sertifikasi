<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peserta - Sertifikasi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background-color: #0f172a;
            color: #ffffff;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 36px;
            height: 36px;
            background-color: #38bdf8;
            color: #0f172a;
            font-weight: bold;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .brand-title {
            font-size: 18px;
            font-weight: 700;
        }

        .logout-btn {
            background-color: #ef4444;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .logout-btn:hover {
            background-color: #dc2626;
        }

        /* CONTAINER */
        .container {
            max-width: 900px;
            margin: 32px auto;
            padding: 0 20px;
        }

        .page-header {
            margin-bottom: 24px;
        }

        .page-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
        }

        .page-header p {
            font-size: 14px;
            color: #64748b;
        }

        /* ALERT */
        .alert-success {
            background-color: #dcfce7;
            color: #15803d;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background-color: #fee2e2;
            color: #dc2626;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            border: 1px solid #fecaca;
        }

        /* CARDS */
        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 28px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            margin-bottom: 24px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* SKEMA BADGE */
        .skema-badge {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .skema-info-box {
            background-color: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
        }

        .skema-info-box .label {
            font-size: 12px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
        }

        .skema-info-box .value {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin-top: 4px;
        }

        .skema-info-box .desc {
            font-size: 13px;
            color: #475569;
            margin-top: 6px;
        }

        /* FORM STYLING */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full-width {
            grid-column: span 2;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
        }

        .required {
            color: #dc2626;
        }

        .form-control {
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s;
            width: 100%;
        }

        .form-control:read-only, .form-control:disabled {
            background-color: #f1f5f9;
            color: #64748b;
            cursor: not-allowed;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        .form-control:focus:not(:read-only) {
            border-color: #0f172a;
        }

        .field-error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 4px;
        }

        .btn-submit {
            background-color: #0f172a;
            color: #ffffff;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 20px;
        }

        .btn-submit:hover {
            background-color: #1e293b;
        }

        @media (max-width: 640px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            .full-width {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="navbar-brand">
            <div class="brand-logo">S</div>
            <div class="brand-title">Sistem Sertifikasi</div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                Keluar
            </button>
        </form>
    </header>

    <!-- MAIN CONTAINER -->
    <main class="container">

        <div class="page-header">
            <h1>Dashboard Peserta</h1>
            <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>! Kelola informasi profil dan pendaftaran sertifikasi Anda.</p>
        </div>

        {{-- Flash Notification --}}
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                <strong>Gagal memperbarui data:</strong> Mohon periksa kembali inputan Anda.
            </div>
        @endif

        @php
            $peserta = $pesertas->first();
        @endphp

        @if($peserta)
            <!-- SKEMA SERTIFIKASI CARD (READ-ONLY) -->
            <div class="card">
                <div class="card-title">
                    <span>Skema Sertifikasi Terdaftar</span>
                    <span class="skema-badge">Terdaftar</span>
                </div>

                <div class="skema-info-box">
                    <div class="label">Kode & Nama Skema</div>
                    <div class="value">
                        {{ $peserta->skema->kode_skema ?? '-' }} - {{ $peserta->skema->nama_skema ?? 'Skema tidak ditemukan' }}
                    </div>
                    @if(optional($peserta->skema)->deskripsi)
                        <div class="desc">{{ $peserta->skema->deskripsi }}</div>
                    @endif
                </div>

                <p style="font-size: 12px; color: #64748b; font-style: italic;">
                    * Skema sertifikasi bersifat tetap dan tidak dapat diubah secara mandiri.
                </p>
            </div>

            <!-- EDIT PROFIL PESERTA CARD -->
            <div class="card">
                <div class="card-title">
                    <span>Edit Profil Peserta</span>
                </div>

                <form action="{{ route('peserta.self.update', $peserta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="no_peserta">Nomor Peserta</label>
                            <input
                                type="text"
                                id="no_peserta"
                                class="form-control"
                                value="{{ $peserta->no_peserta }}"
                                readonly
                            >
                            <span style="font-size: 11px; color: #94a3b8; margin-top: 2px;">* Nomor peserta dibuat oleh sistem/admin</span>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Lengkap <span class="required">*</span></label>
                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                class="form-control"
                                value="{{ old('nama', $peserta->nama) }}"
                                required
                            >
                            @error('nama')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nik">NIK <span class="required">*</span></label>
                            <input
                                type="text"
                                id="nik"
                                name="nik"
                                class="form-control"
                                value="{{ old('nik', $peserta->nik) }}"
                                required
                            >
                            @error('nik')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin <span class="required">*</span></label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                <option value="L" {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="P" {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input
                                type="tel"
                                id="no_telepon"
                                name="no_telepon"
                                class="form-control"
                                value="{{ old('no_telepon', $peserta->no_telepon) }}"
                                placeholder="08xxxxxxxxxx"
                            >
                            @error('no_telepon')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea
                                id="alamat"
                                name="alamat"
                                class="form-control"
                                placeholder="Masukkan alamat lengkap"
                            >{{ old('alamat', $peserta->alamat) }}</textarea>
                            @error('alamat')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <button type="submit" class="btn-submit">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        @else
            <!-- JIKA PESERTA BELUM PUNYA DATA PROFIL -->
            <div class="card">
                <div class="card-title">
                    <span>Lengkapi Data Peserta</span>
                </div>

                <form action="{{ route('peserta.self.store') }}" method="POST">
                    @csrf

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="no_peserta">Nomor Peserta <span class="required">*</span></label>
                            <input
                                type="text"
                                id="no_peserta"
                                name="no_peserta"
                                class="form-control"
                                value="{{ old('no_peserta') }}"
                                placeholder="Contoh: P001"
                                required
                            >
                            @error('no_peserta')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nik">NIK <span class="required">*</span></label>
                            <input
                                type="text"
                                id="nik"
                                name="nik"
                                class="form-control"
                                value="{{ old('nik') }}"
                                placeholder="16 digit NIK"
                                required
                            >
                            @error('nik')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin <span class="required">*</span></label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="skema_id">Skema Sertifikasi <span class="required">*</span></label>
                            <select id="skema_id" name="skema_id" class="form-control" required>
                                <option value="">-- Pilih Skema Sertifikasi --</option>
                                @foreach($allSkemas as $skema)
                                    <option value="{{ $skema->id }}" {{ old('skema_id') == $skema->id ? 'selected' : '' }}>
                                        {{ $skema->kode_skema }} - {{ $skema->nama_skema }}
                                    </option>
                                @endforeach
                            </select>
                            @error('skema_id')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input
                                type="tel"
                                id="no_telepon"
                                name="no_telepon"
                                class="form-control"
                                value="{{ old('no_telepon') }}"
                                placeholder="08xxxxxxxxxx"
                            >
                            @error('no_telepon')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea
                                id="alamat"
                                name="alamat"
                                class="form-control"
                                placeholder="Masukkan alamat lengkap"
                            >{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <button type="submit" class="btn-submit">
                        Simpan Data Pertama Kali
                    </button>
                </form>
            </div>
        @endif

    </main>

</body>
</html>