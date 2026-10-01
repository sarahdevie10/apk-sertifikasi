<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Skema Sertifikasi</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #111827;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        }

        .back {
            display: inline-block;
            text-decoration: none;
            background: #6b7280;
            color: white;
            padding: 10px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .back:hover {
            background: #4b5563;
        }

        h2 {
            margin: 0 0 25px;
            font-size: 26px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
        }

        .button-area {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-update {
            background: #2563eb;
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-update:hover {
            background: #1d4ed8;
        }

        .btn-cancel {
            background: #e5e7eb;
            color: #374151;
            text-decoration: none;
            padding: 11px 20px;
            border-radius: 7px;
            font-size: 14px;
        }

        .btn-cancel:hover {
            background: #d1d5db;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <a href="{{ route('skema.index') }}" class="back">
            ← Kembali
        </a>

        <h2>
            Edit Skema Sertifikasi
        </h2>


        @if ($errors->any())

            <div class="error">

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <form
            action="{{ route('skema.update', $skema) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="form-group">

                <label for="kode_skema">
                    Kode Skema
                </label>

                <input
                    type="text"
                    id="kode_skema"
                    name="kode_skema"
                    value="{{ old('kode_skema', $skema->kode_skema) }}"
                    required
                >

            </div>


            <div class="form-group">

                <label for="nama_skema">
                    Nama Skema
                </label>

                <input
                    type="text"
                    id="nama_skema"
                    name="nama_skema"
                    value="{{ old('nama_skema', $skema->nama_skema) }}"
                    required
                >

            </div>


            <div class="form-group">

                <label for="deskripsi">
                    Deskripsi
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                >{{ old('deskripsi', $skema->deskripsi) }}</textarea>

            </div>


            <div class="button-area">

                <button
                    type="submit"
                    class="btn-update"
                >
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('skema.index') }}"
                    class="btn-cancel"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>