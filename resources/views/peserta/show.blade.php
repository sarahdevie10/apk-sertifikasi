<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peserta</title>

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
            margin-bottom: 25px;
        }

        .data {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 15px;
            border-bottom: 1px solid #eee;
            padding: 12px 0;
        }

        .label {
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 18px;
            background: #6b7280;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn-edit {
            background: #f59e0b;
            margin-left: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Detail Peserta</h2>

    <div class="data">
        <div class="label">No Peserta</div>
        <div>{{ $peserta->no_peserta }}</div>
    </div>

    <div class="data">
        <div class="label">Nama</div>
        <div>{{ $peserta->nama }}</div>
    </div>

    <div class="data">
        <div class="label">NIK</div>
        <div>{{ $peserta->nik }}</div>
    </div>

    <div class="data">
        <div class="label">Jenis Kelamin</div>
        <div>{{ $peserta->jenis_kelamin }}</div>
    </div>

    <div class="data">
        <div class="label">Alamat</div>
        <div>{{ $peserta->alamat ?? '-' }}</div>
    </div>

    <div class="data">
        <div class="label">No. Telepon</div>
        <div>{{ $peserta->no_telepon ?? '-' }}</div>
    </div>

    <div class="data">
        <div class="label">Skema Sertifikasi</div>
        <div>
            {{ $peserta->skema->kode_skema ?? '-' }}
            -
            {{ $peserta->skema->nama_skema ?? '-' }}
        </div>
    </div>

    <a href="{{ route('peserta.index') }}" class="btn">
        Kembali
    </a>

    <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-edit">
        Edit
    </a>

</div>

</body>
</html>