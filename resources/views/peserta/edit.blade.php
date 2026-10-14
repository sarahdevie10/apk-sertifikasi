<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peserta</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 90px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
        }

        .buttons {
            margin-top: 20px;
        }

        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-save {
            background: #f59e0b;
            color: white;
        }

        .btn-back {
            background: #6b7280;
            color: white;
        }
    </style>
</head>

<body>

<div class="page-header">
    <h1>Edit Data Peserta</h1>
</div>

<div class="card">
    <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label for="no_peserta">No. Peserta <span class="required">*</span></label>
                <input
                    type="text"
                    id="no_peserta"
                    name="no_peserta"
                    class="form-control"
                    value="{{ old('no_peserta', $peserta->no_peserta) }}"
                    required
                >
                @error('no_peserta')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama Peserta <span class="required">*</span></label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    class="form-control"
                    value="{{ old('nama', $peserta->nama) }}"
                    required
                >
                @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input Email ditambahkan agar akun User terhubung ikut ter-update --}}
            <div class="form-group full-width">
                <label for="email">Alamat Email (Akun Login) <span class="required">*</span></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $peserta->user->email ?? '') }}"
                    required
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
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
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin <span class="required">*</span></label>
                {{-- Value disesuaikan dengan enum L / P --}}
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L" {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="P" {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>
                @error('jenis_kelamin')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_telepon">No. Telepon</label>
                <input
                    type="text"
                    id="no_telepon"
                    name="no_telepon"
                    class="form-control"
                    value="{{ old('no_telepon', $peserta->no_telepon) }}"
                >
                @error('no_telepon')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="skema_id">Skema Sertifikasi <span class="required">*</span></label>
                <select id="skema_id" name="skema_id" class="form-control" required>
                    <option value="">-- Pilih Skema Sertifikasi --</option>
                    @foreach($skemas as $skema)
                        <option
                            value="{{ $skema->id }}"
                            {{ old('skema_id', $peserta->skema_id) == $skema->id ? 'selected' : '' }}
                        >
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
                <textarea id="alamat" name="alamat" class="form-control">{{ old('alamat', $peserta->alamat) }}</textarea>
                @error('alamat')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="buttons">
            <a href="{{ route('peserta.index') }}" class="btn btn-back">
                Kembali
            </a>

            <button type="submit" class="btn btn-save">
                Simpan Perubahan
            </button>
        </div>

    </form>
</div>

</body>
</html>