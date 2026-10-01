<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Skema Sertifikasi</title>

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

        table {
            width: 100%;
            border-collapse: collapse;
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

                <h2>Data Skema Sertifikasi</h2>
            </div>

            <a href="{{ route('skema.create') }}" class="btn">
                + Tambah Skema
            </a>

        </div>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

    </div>


    <div class="table-box">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Skema</th>
                    <th>Nama Skema</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($skemas as $skema)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $skema->kode_skema }}
                        </td>

                        <td>
                            {{ $skema->nama_skema }}
                        </td>

                        <td>
                            {{ $skema->deskripsi ?? '-' }}
                        </td>

                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('skema.edit', $skema) }}"
                                    class="btn btn-edit"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('skema.destroy', $skema) }}"
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
                        <td colspan="5" class="empty">
                            Belum ada data skema.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>