
@extends('layouts.admin')

@section('title', 'Data Skema')

@section('content')

    <div class="page-header">
        <div>
            <h1>Data Skema Sertifikasi</h1>
            <p>Kelola data skema sertifikasi.</p>
        </div>

        <a href="{{ route('skema.create') }}" class="btn">
            + Tambah Skema
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error-list">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="panel">
        <div class="table-wrapper">

            <table class="data-table">

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
                    @forelse($skemas as $skema)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $skema->kode_skema }}</td>
                            <td>{{ $skema->nama_skema }}</td>
                            <td>{{ $skema->deskripsi ?? '-' }}</td>

                            <td>
                                <div class="actions">

                                    <a
                                        href="{{ route('skema.edit', $skema) }}"
                                        class="btn btn-edit">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('skema.destroy', $skema) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data skema ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-delete">
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

@endsection
