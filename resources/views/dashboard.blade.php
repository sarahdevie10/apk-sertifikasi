
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="page-header">
        <div>
            <h1>Dashboard</h1>
            <p>Selamat datang kembali, <strong>{{ Auth::user()->name }}</strong>!</p>
        </div>
    </div>

    <div class="dashboard-cards">

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-label">Total Peserta</span>
                <div class="stat-icon">👤</div>
            </div>

            <div class="stat-number">{{ $jumlahPeserta }}</div>
            <p class="stat-description">Peserta yang terdaftar</p>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <span class="stat-label">Total Skema</span>
                <div class="stat-icon">📋</div>
            </div>

            <div class="stat-number">{{ $jumlahSkema }}</div>
            <p class="stat-description">Skema sertifikasi tersedia</p>
        </div>

    </div>

@endsection
