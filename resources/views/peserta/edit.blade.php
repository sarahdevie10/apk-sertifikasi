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

<div class="container">

    <h2>Edit Data Peserta</h2>

    <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>No Peserta</label>

            <input
                type="text"
                name="no_peserta"
                value="{{ old('no_peserta', $peserta->no_peserta) }}"
            >

            @error('no_peserta')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nama Peserta</label>

            <input
                type="text"
                name="nama"
                value="{{ old('nama', $peserta->nama) }}"
            >

            @error('nama')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>NIK</label>

            <input
                type="text"
                name="nik"
                value="{{ old('nik', $peserta->nik) }}"
            >

            @error('nik')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>

            <select name="jenis_kelamin">
                <option value="">-- Pilih Jenis Kelamin --</option>

                <option value="Laki-laki"
                    {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                    Laki-laki
                </option>

                <option value="Perempuan"
                    {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </select>

            @error('jenis_kelamin')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Alamat</label>

            <textarea name="alamat">{{ old('alamat', $peserta->alamat) }}</textarea>

            @error('alamat')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>No. Telepon</label>

            <input
                type="text"
                name="no_telepon"
                value="{{ old('no_telepon', $peserta->no_telepon) }}"
            >

            @error('no_telepon')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Skema Sertifikasi</label>

            <select name="skema_id">

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

        <div class="buttons">

            <button type="submit" class="btn btn-save">
                Simpan Perubahan
            </button>

            <a href="{{ route('peserta.index') }}" class="btn btn-back">
                Kembali
            </a>

        </div>

    </form>

</div>

</body>
</html>