<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - Sertifikasi</title>

    @php
        $user = auth()->user();
        $peserta = $pesertas->first();
    @endphp

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f8;
            color: #172033;
        }

        .topbar {
            background: #111827;
            color: white;
            padding: 18px 4%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #e5e7eb;
            color: #4b5563;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .user-info {
            text-align: right;
        }

        .user-info strong {
            display: block;
            font-size: 14px;
        }

        .user-info small {
            color: #d1d5db;
        }

        .logout {
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 11px 17px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout:hover {
            background: #dc2626;
        }

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 30px auto;
        }

        .card {
            background: white;
            border: 1px solid #e0e3e9;
            border-radius: 13px;
            margin-bottom: 22px;
            overflow: hidden;
        }

        .welcome {
            padding: 24px;
        }

        .welcome h1 {
            font-size: 26px;
            margin: 0 0 12px;
        }

        .welcome p {
            color: #64748b;
            line-height: 1.7;
            margin: 0;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e0e3e9;
            border-radius: 13px;
            padding: 22px;
        }

        .stat-card p {
            color: #64748b;
            margin: 0 0 12px;
        }

        .stat-card h2 {
            font-size: 30px;
            margin: 0;
        }

        .card-header {
            padding: 21px 24px;
            border-bottom: 1px solid #e0e3e9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .card-header h2 {
            font-size: 21px;
            margin: 0 0 7px;
        }

        .card-header p {
            color: #64748b;
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
        }

        .card-body {
            padding: 24px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .detail-item {
            padding-bottom: 14px;
            border-bottom: 1px solid #edf0f4;
            min-width: 0;
        }

        .detail-item label {
            display: block;
            color: #64748b;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .detail-item strong {
            display: block;
            font-size: 15px;
            overflow-wrap: anywhere;
            white-space: pre-line;
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 11px 17px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }

        .btn-edit {
            background: #2563eb;
            color: white;
        }

        .btn-edit:hover {
            background: #1d4ed8;
        }

        .btn-save {
            background: #16a34a;
            color: white;
        }

        .btn-save:hover {
            background: #15803d;
        }

        .btn-cancel {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-cancel:hover {
            background: #d1d5db;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .form-group {
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            background: white;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        .form-group input[readonly] {
            background: #f1f5f9;
            color: #475569;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group small {
            display: block;
            margin-top: 6px;
            color: #64748b;
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 22px;
            flex-wrap: wrap;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .error-text {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }

        .notice {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            color: #64748b;
            font-size: 13px;
            padding: 8px 0 25px;
        }

        [hidden] {
            display: none !important;
        }

        @media (max-width: 650px) {
            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .user-area {
                width: 100%;
                flex-wrap: wrap;
            }

            .user-info {
                text-align: left;
                flex: 1;
            }

            .stats,
            .detail-grid,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .welcome h1 {
                font-size: 22px;
            }

            .card-body,
            .welcome {
                padding: 19px;
            }
        }
    </style>
</head>

<body>

    {{-- TOPBAR --}}
    <header class="topbar">
        <div class="brand">
            Sertifikasi - Dashboard User
        </div>

        <div class="user-area">
            <div class="avatar">♙</div>

            <div class="user-info">
                <strong>{{ $user->name }}</strong>
                <small>{{ $user->email }}</small>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <main class="container">

        {{-- PESAN SUKSES --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- PESAN ERROR --}}
        @if ($errors->any())
            <div class="alert alert-error">
                Ada data yang perlu diperbaiki. Periksa kembali formulir.
            </div>
        @endif

        {{-- SAMBUTAN --}}
        <section class="card welcome">
            <h1>Halo, {{ $user->name }}!</h1>

            <p>
                Selamat datang di Dashboard User Aplikasi Pengelolaan Data
                Peserta Sertifikasi. Kamu dapat melihat detail data peserta
                milikmu dan memperbaruinya melalui tombol Edit Data.
            </p>
        </section>

        {{-- STATISTIK --}}
        <section class="stats">
            <div class="stat-card">
                <p>Data Peserta Milik Saya</p>
                <h2>{{ $pesertas->count() }}</h2>
            </div>

            <div class="stat-card">
                <p>Skema Sertifikasi Saya</p>
                <h2>{{ $skemas->count() }}</h2>
            </div>
        </section>

        {{-- DETAIL DATA PESERTA --}}
        <section class="card">
            <div class="card-header">
                <div>
                    <h2>Detail Data Peserta</h2>
                    <p>
                        Informasi data peserta yang terhubung dengan akunmu.
                    </p>
                </div>

                <button
                    type="button"
                    class="btn btn-edit"
                    onclick="toggleEdit()"
                    id="editButton"
                >
                    Edit Data
                </button>
            </div>

            <div class="card-body">
                <div class="detail-grid">

                    <div class="detail-item">
                        <label>Nama Lengkap</label>
                        <strong>{{ $peserta?->nama ?: $user->name }}</strong>
                    </div>

                    <div class="detail-item">
                        <label>Nomor Peserta</label>
                        <strong>{{ $peserta?->no_peserta ?: 'Belum diisi' }}</strong>
                    </div>

                    <div class="detail-item">
                        <label>NIK</label>
                        <strong>{{ $peserta?->nik ?: 'Belum diisi' }}</strong>
                    </div>

                    <div class="detail-item">
                        <label>Jenis Kelamin</label>
                        <strong>{{ $peserta?->jenis_kelamin ?: 'Belum diisi' }}</strong>
                    </div>

                    <div class="detail-item">
                        <label>Nomor Telepon</label>
                        <strong>{{ $peserta?->no_telepon ?: 'Belum diisi' }}</strong>
                    </div>

                    <div class="detail-item">
                        <label>Skema Sertifikasi</label>
                        <strong>{{ $peserta?->skema?->nama_skema ?: 'Belum dipilih' }}</strong>
                    </div>

                    <div class="detail-item">
                        <label>Email Akun</label>
                        <strong>{{ $user->email }}</strong>
                    </div>

                    <div class="detail-item">
                        <label>Alamat</label>
                        <strong>{{ $peserta?->alamat ?: 'Belum diisi' }}</strong>
                    </div>

                </div>

                @unless ($peserta)
                    <p class="notice">
                        Data peserta belum tersimpan. Tekan Edit Data untuk
                        melengkapi data pertama kali.
                    </p>
                @endunless
            </div>
        </section>

        {{-- FORM EDIT ATAU PENGISIAN PERTAMA --}}
        <section
            class="card"
            id="editForm"
            @if (!$errors->any()) hidden @endif
        >
            <div class="card-header">
                <div>
                    <h2>
                        {{ $peserta ? 'Edit Data Peserta' : 'Lengkapi Data Peserta' }}
                    </h2>

                    <p>
                        {{ $peserta
                            ? 'Perbarui informasi data peserta milikmu.'
                            : 'Isi data peserta agar tersimpan di sistem.' }}
                    </p>
                </div>
            </div>

            <div class="card-body">

                {{-- JIKA DATA PESERTA SUDAH ADA: FORM EDIT --}}
                @if ($peserta)

                    <form
                        action="{{ route('user.peserta.update', $peserta->id) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PUT')

                        <div class="form-grid">

                            <div class="form-group">
                                <label>Nama Lengkap</label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name', $peserta->nama) }}"
                                    required
                                >

                                @error('name')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nomor Peserta</label>

                                <input
                                    type="text"
                                    value="{{ $peserta->no_peserta }}"
                                    readonly
                                >

                                <small>
                                    Nomor peserta tidak diubah melalui formulir ini.
                                </small>
                            </div>

                            <div class="form-group">
                                <label>NIK</label>

                                <input
                                    type="text"
                                    name="nik"
                                    value="{{ old('nik', $peserta->nik) }}"
                                    required
                                >

                                @error('nik')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>

                                <select name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>

                                    <option
                                        value="Laki-laki"
                                        {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}
                                    >
                                        Laki-laki
                                    </option>

                                    <option
                                        value="Perempuan"
                                        {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}
                                    >
                                        Perempuan
                                    </option>
                                </select>

                                @error('jenis_kelamin')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nomor Telepon</label>

                                <input
                                    type="text"
                                    name="no_telepon"
                                    value="{{ old('no_telepon', $peserta->no_telepon) }}"
                                >

                                @error('no_telepon')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Skema Sertifikasi</label>

                                <input
                                    type="text"
                                    value="{{ $peserta->skema?->nama_skema ?? 'Belum dipilih' }}"
                                    readonly
                                >

                                <small>
                                    Skema sertifikasi tidak diubah melalui formulir ini.
                                </small>
                            </div>

                            <div class="form-group full">
                                <label>Alamat</label>

                                <textarea name="alamat">{{ old('alamat', $peserta->alamat) }}</textarea>

                                @error('alamat')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-save">
                                Simpan Perubahan
                            </button>

                            <button
                                type="button"
                                class="btn btn-cancel"
                                onclick="toggleEdit()"
                            >
                                Batal
                            </button>
                        </div>
                    </form>

                {{-- JIKA DATA PESERTA BELUM ADA: FORM PENGISIAN PERTAMA --}}
                @else

                    <form
                        action="{{ route('user.peserta.store') }}"
                        method="POST"
                    >
                        @csrf

                        <div class="form-grid">

                            <div class="form-group">
                                <label>Nama Lengkap</label>

                                <input
                                    type="text"
                                    value="{{ $user->name }}"
                                    readonly
                                >

                                <small>
                                    Nama mengikuti nama akun yang terdaftar.
                                </small>
                            </div>

                            <div class="form-group">
                                <label>Nomor Peserta</label>

                                <input
                                    type="text"
                                    name="no_peserta"
                                    value="{{ old('no_peserta') }}"
                                    placeholder="Contoh: P006"
                                    required
                                >

                                @error('no_peserta')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NIK</label>

                                <input
                                    type="text"
                                    name="nik"
                                    value="{{ old('nik') }}"
                                    required
                                >

                                @error('nik')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>

                                <select name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>

                                    <option
                                        value="Laki-laki"
                                        {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}
                                    >
                                        Laki-laki
                                    </option>

                                    <option
                                        value="Perempuan"
                                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}
                                    >
                                        Perempuan
                                    </option>
                                </select>

                                @error('jenis_kelamin')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nomor Telepon</label>

                                <input
                                    type="text"
                                    name="no_telepon"
                                    value="{{ old('no_telepon') }}"
                                >

                                @error('no_telepon')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Skema Sertifikasi</label>

                                <select name="skema_id" required>
                                    <option value="">Pilih Skema Sertifikasi</option>

                                    @foreach ($allSkemas as $skema)
                                        <option
                                            value="{{ $skema->id }}"
                                            {{ old('skema_id') == $skema->id ? 'selected' : '' }}
                                        >
                                            {{ $skema->nama_skema }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('skema_id')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group full">
                                <label>Alamat</label>

                                <textarea name="alamat">{{ old('alamat') }}</textarea>

                                @error('alamat')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-save">
                                Simpan Data
                            </button>

                            <button
                                type="button"
                                class="btn btn-cancel"
                                onclick="toggleEdit()"
                            >
                                Batal
                            </button>
                        </div>
                    </form>

                @endif

            </div>
        </section>

        <footer class="footer">
            &copy; {{ date('Y') }} Aplikasi Pengelolaan Data Peserta Sertifikasi
        </footer>

    </main>

    <script>
        function toggleEdit() {
            const form = document.getElementById('editForm');

            form.hidden = !form.hidden;

            if (!form.hidden) {
                form.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    </script>

</body>
</html>