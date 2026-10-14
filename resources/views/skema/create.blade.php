
@extends('layouts.layout')

@section('title', 'Tambah Skema')

@section('content')

    <style>
        .form-card {
            max-width: 850px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 28px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .form-description {
            margin: -10px 0 25px;
            color: #6b7280;
            font-size: 13px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            color: #374151;
            font-weight: bold;
            font-size: 13px;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            background: #ffffff;
            color: #111827;
            font-size: 14px;
            font-family: Arial, sans-serif;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            border-color: #64748b;
            box-shadow: 0 0 0 3px rgba(100, 116, 139, 0.12);
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            line-height: 1.6;
        }

        .field-error {
            margin-top: 7px;
            color: #dc2626;
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            border-top: 1px solid #edf0f3;
            padding-top: 22px;
            margin-top: 8px;
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            background: #ffffff;
            color: #4b5563;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-cancel:hover {
            background: #f3f4f6;
        }

        @media (max-width: 600px) {
            .form-card {
                padding: 18px;
            }

            .form-actions {
                flex-wrap: wrap;
            }
        }
    </style>

  <div class="page-header">
        <div>
            <h1>Tambah Skema Sertifikasi</h1>
            <p>Tambahkan data skema sertifikasi baru.</p>
        </div>

        <a href="{{ route('skema.index') }}" class="btn btn-detail">
            ← Data Skema
        </a>
    </div>

    @if($errors->any())
        <div class="error-list">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="form-card">

        <p class="form-description">
            Silakan isi informasi skema sertifikasi pada formulir berikut.
            Pastikan data yang dimasukkan sudah benar.
        </p>

        <form action="{{ route('skema.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="kode_skema">Kode Skema</label>

                <input
                    type="text"
                    id="kode_skema"
                    name="kode_skema"
                    class="form-control"
                    placeholder="Contoh: JWD-003"
                    value="{{ old('kode_skema') }}"
                    required
                >

                @error('kode_skema')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_skema">Nama Skema</label>

                <input
                    type="text"
                    id="nama_skema"
                    name="nama_skema"
                    class="form-control"
                    placeholder="Masukkan nama skema sertifikasi"
                    value="{{ old('nama_skema') }}"
                    required
                >

                @error('nama_skema')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    class="form-control"
                    placeholder="Masukkan deskripsi skema sertifikasi..."
                >{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('skema.index') }}" class="btn-cancel">
                    Batal
                </a>

                <button type="submit" class="btn">
                    Simpan Skema
                </button>
            </div>

        </form>

    </div>

@endsection
