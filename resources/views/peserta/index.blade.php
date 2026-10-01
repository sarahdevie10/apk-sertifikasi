<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta Sertifikasi</title>

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
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        h2 {
            margin: 8px 0 0;
            font-size: 26px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn {
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 7px;
            color: white;
            background: #2563eb;
            display: inline-block;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .btn-back {
            background: #6b7280;
        }

        .btn-detail {
            background: #16a34a;
        }

        .btn-edit {
            background: #f59e0b;
        }

        .btn-delete {
            background: #dc2626;
            border: none;
            padding: 9px 12px;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 7px;
            margin-top: 20px;
        }

        .table-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        .search {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
            align-items: center;
        }

        .search input {
            padding: 10px 12px;
            width: 320px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            outline: none;
        }

        .search input:focus {
            border-color: #2563eb;
        }

        .search button {
            padding: 10px 16px;
            border: none;
            background: #2563eb;
            color: white;
            border-radius: 7px;
            cursor: pointer;
        }

        .search button:hover {
            background: #1d4ed8;
        }

        .reset {
            text-decoration: none;
            color: #6b7280;
            font-size: 14px;
            margin-left: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        th {
            background: #f1f5f9;
            padding: 14px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 14px;
            border-top: 1px solid #e5e7eb;
            font-size: 14px;
        }

        tr:hover {
            background: #f8fafc;
        }

        .actions {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 25px;
        }

        @media (max-width: 700px) {
            .top {
                flex-direction: column;
                align-items: flex-start;
            }

            .buttons {
                width: 100%;
            }

            .search input {
                width: 100%;
            }

            .search {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div class="top">

            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-back">
                    ← Kembali
                </a>

                <h2>Data Peserta Sertifikasi</h2>
            </div>

            <div class="buttons">
                <a href="{{ route('peserta.create') }}" class="btn">
                    + Tambah Peserta
                </a>
            </div>

        </div>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

    </div>


    <div class="table-box">

        <form action="{{ route('peserta.index') }}" method="GET" class="search">

            <input
                type="text"
                name="search"
                placeholder="Cari nama, no peserta, atau NIK..."
                value="{{ $search }}"
            >

            <button type="submit">
                Cari
            </button>

            @if($search)
                <a href="{{ route('peserta.index') }}" class="reset">
                    Reset
                </a>
            @endif

        </form>


        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>No Peserta</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Skema Sertifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>


            <tbody>

                @forelse($pesertas as $peserta)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $peserta->no_peserta }}
                        </td>

                        <td>
                            {{ $peserta->nama }}
                        </td>

                        <td>
                            {{ $peserta->nik }}
                        </td>

                        <td>
                            {{ $peserta->jenis_kelamin }}
                        </td>

                        <td>
                            {{ $peserta->no_telepon ?? '-' }}
                        </td>

                        <td>
                            {{ $peserta->skema->nama_skema ?? '-' }}
                        </td>

                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('peserta.show', $peserta->id) }}"
                                    class="btn btn-detail"
                                >
                                    Detail
                                </a>

                                <a
                                    href="{{ route('peserta.edit', $peserta->id) }}"
                                    class="btn btn-edit"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('peserta.destroy', $peserta->id) }}"
                                    method="POST"
                                    style="display: inline;"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-delete"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    >
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="8" class="empty">
                            Belum ada data peserta.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>