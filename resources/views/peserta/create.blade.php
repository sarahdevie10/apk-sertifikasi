
@extends('layouts.layout')

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
         .page-header {
        margin-bottom: 24px;
    }

    .page-header h1 {
        font-size: 22px;
        font-weight: 700;
        color: #0f172a;
    }

    .card {
        background: #ffffff;
        border-radius: 12px;
        padding: 28px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .full-width {
        grid-column: span 2;
    }

    label {
        font-size: 13px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 6px;
    }

    .required {
        color: #dc2626;
    }

    .form-control {
        padding: 10px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
        width: 100%;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 80px;
    }

    .form-control:focus {
        border-color: #0f172a;
    }

    .field-error {
        color: #dc2626;
        font-size: 12px;
        margin-top: 4px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid #f1f5f9;
    }

    .btn {
        background-color: #0f172a;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn:hover {
        background-color: #1e293b;
    }

    .btn-cancel {
        background-color: #f1f5f9;
        color: #475569;
        padding: 10px 20px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-cancel:hover {
        background-color: #e2e8f0;
    }

    @media (max-width: 640px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        .full-width {
            grid-column: span 1;
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


<div class="page-header">
    <h1>Tambah Peserta Baru</h1>
</div>

<div class="card">
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

            {{-- Input Email ditambahkan agar akun user otomatis terbuat --}}
            <div class="form-group full-width">
                <label for="email">
                    Alamat Email (Untuk Akun Login) <span class="required">*</span>
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan alamat email aktif"
                    value="{{ old('email') }}"
                    required
                >

                @error('email')
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

                {{-- Value disesuaikan dengan enum L / P di database --}}
                <select
                    id="jenis_kelamin"
                    name="jenis_kelamin"
                    class="form-control"
                    required
                >
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
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

