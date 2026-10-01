<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Skema</title>
</head>
<body>

    <h1>Tambah Skema Sertifikasi</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('skema.store') }}" method="POST">

        @csrf

        <label>Kode Skema</label>
        <br>
        <input type="text" name="kode_skema" value="{{ old('kode_skema') }}">
        <br><br>

        <label>Nama Skema</label>
        <br>
        <input type="text" name="nama_skema" value="{{ old('nama_skema') }}">
        <br><br>

        <label>Deskripsi</label>
        <br>
        <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
        <br><br>

        <button type="submit">Simpan</button>

    </form>

    <br>

    <a href="{{ route('skema.index') }}">Kembali</a>

</body>
</html>