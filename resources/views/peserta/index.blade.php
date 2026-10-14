
@extends('layouts.layout')

@section('title', 'Data Peserta')

@section('content')

    <div class="page-header">
        <div>
            <h1>Data Peserta</h1>
            <p>Kelola data peserta sertifikasi.</p>
        </div>

        <a href="{{ route('peserta.create') }}" class="btn">
            + Tambah Peserta
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
        <div class="panel-body">

            <form action="{{ route('peserta.index') }}"
                  method="GET"
                  class="search-form">

                <input
                    type="text"
                    name="search"
                    placeholder="Cari nama, no peserta, atau NIK..."
                    value="{{ $search ?? '' }}"
                >

                <button type="submit" class="btn">Cari</button>

                @if(!empty($search))
                    <a href="{{ route('peserta.index') }}" class="reset-link">
                        Reset
                    </a>
                @endif

            </form>

            <div class="table-wrapper">
                <table class="data-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Peserta</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telepon</th>
                            <th>Skema Sertifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($pesertas as $peserta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peserta->no_peserta }}</td>
                                <td>{{ $peserta->nama }}</td>
                                <td>{{ $peserta->nik }}</td>
                                <td>{{ $peserta->jenis_kelamin }}</td>
                                <td>{{ $peserta->no_telepon ?? '-' }}</td>
                                <td>{{ $peserta->skema->nama_skema ?? '-' }}</td>

                                <td>
                                    <div class="actions">

                                        <a
                                            href="{{ route('peserta.show', $peserta->id) }}"
                                            class="btn btn-detail">
                                            Detail
                                        </a>

                                        <a
                                            href="{{ route('peserta.edit', $peserta->id) }}"
                                            class="btn btn-edit">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('peserta.destroy', $peserta->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

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
                                <td colspan="8" class="empty">
                                    @if(!empty($search))
                                        Data peserta yang dicari tidak ditemukan.
                                    @else
                                        Belum ada data peserta.
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

@endsection
