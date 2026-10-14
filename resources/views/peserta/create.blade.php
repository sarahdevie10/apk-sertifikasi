
@extends('layouts.admin')

@section('title', 'Tambah Peserta')

@section('content')

    <style>
        .form-card {
            max-width: 900px;
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

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0 22px;
        }

        .form-group {
            margin-bottom: 21px;
            min-width: 0;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
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
            min-height: 110px;
            resize: vertical;
            line-height: 1.6;
        }

        .field-error {
            margin-top: 7px;
            color: #dc2626;
            font-size: 12px;
        }

        .required {
            color: #dc2626;
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

        @media (max-width: 650px) {
            .form-card {
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: auto;
            }

            .form-actions {
                flex-wrap: wrap;
            }
        }
    </style>

    <div class="page-header">
        <div>
            <h1>Tambah Peserta</h1>
            <p>Masukkan informasi peserta sertifikasi yang baru.</p>
        </div>

        <a href="{{ route('peserta.index') }}" class="btn btn-detail">
            ← Data Peserta
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
            Lengkapi data peserta pada formulir di bawah ini.
            Kolom bertanda <span class="required">*</span> wajib diisi.
        </p>

        <form action="{{ route('peserta.store') }}" method="POST">
            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label for="no_peserta">
                        Nomor Peserta <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="no_peserta"
                        name="no_peserta"
                        class="form-control"
                        placeholder="Contoh: P003"
                        value="{{ old('no_peserta') }}"
                        required
                    >

                    @error('no_peserta')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">
                        Nama Lengkap <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        class="form-control"
                        placeholder="Masukkan nama lengkap"
                        value="{{ old('nama') }}"
                        required
                    >

                    @error('nama')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nik">
                        NIK <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="nik"
                        name="nik"
                        class="form-control"
                        placeholder="Masukkan nomor NIK"
                        value="{{ old('nik') }}"
                        required
                    >

                    @error('nik')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">
                        Jenis Kelamin <span class="required">*</span>
                    </label>

                    <select
                        id="jenis_kelamin"
                        name="jenis_kelamin"
                        class="form-control"
                        required
                    >
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>

                    @error('jenis_kelamin')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon</label>

                    <input
                        type="tel"
                        id="no_telepon"
                        name="no_telepon"
                        class="form-control"
                        placeholder="Masukkan nomor telepon"
                        value="{{ old('no_telepon') }}"
                    >

                    @error('no_telepon')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="skema_id">
                        Skema Sertifikasi <span class="required">*</span>
                    </label>

                    <select
                        id="skema_id"
                        name="skema_id"
                        class="form-control"
                        required
                    >
                        <option value="">-- Pilih Skema Sertifikasi --</option>

                        @foreach($skemas as $skema)
                            <option
                                value="{{ $skema->id }}"
                                {{ old('skema_id') == $skema->id ? 'selected' : '' }}
                            >
                                {{ $skema->kode_skema }} - {{ $skema->nama_skema }}
                            </option>
                        @endforeach
                    </select>

                    @error('skema_id')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group full-width">
                    <label for="alamat">Alamat</label>

                    <textarea
                        id="alamat"
                        name="alamat"
                        class="form-control"
                        placeholder="Masukkan alamat peserta"
                    >{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('peserta.index') }}" class="btn-cancel">
                    Batal
                </a>

                <button type="submit" class="btn">
                    Simpan Peserta
                </button>
            </div>

        </form>

    </div>

@endsection
