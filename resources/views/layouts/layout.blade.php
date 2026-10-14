
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sertifikasi')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #111827;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            height: 100vh;
            padding: 20px 14px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 8px 25px;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 24px;
        }

        .brand-logo {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #111827;
            color: white;
            font-size: 19px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .brand-name {
            font-size: 16px;
            font-weight: bold;
        }

        .brand-subtitle {
            color: #9ca3af;
            font-size: 11px;
            margin-top: 4px;
        }

        .menu-title {
            margin: 0 10px 12px;
            color: #9ca3af;
            font-size: 11px;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 10px;
            margin-bottom: 7px;
            color: #4b5563;
            text-decoration: none;
            border-radius: 8px;
            font-size: 13px;
            transition: 0.2s;
        }

        .nav-link:hover {
            background: #f3f4f6;
        }

        .nav-link.active {
            background: #eef2f7;
            color: #111827;
            font-weight: bold;
        }

        .nav-icon {
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .nav-icon svg {
            width: 19px;
            height: 19px;
            stroke: currentColor;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 18px;
            border-top: 1px solid #e5e7eb;
        }

        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            color: #4b5563;
            font-size: 13px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #f3f4f6;
        }

        /* PROFIL AKUN */
        .profile-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 8px;
            margin-bottom: 24px;
            border-bottom: 1px solid #e5e7eb;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #111827;
            color: white;
            border-radius: 50%;
            font-size: 16px;
            font-weight: bold;
        }

        .profile-info {
            min-width: 0;
        }

        .profile-name {
            font-size: 13px;
            font-weight: bold;
            color: #111827;
            overflow-wrap: anywhere;
        }

        .profile-email {
            margin-top: 5px;
            font-size: 11px;
            color: #6b7280;
            overflow-wrap: anywhere;
        }

        .profile-label {
            margin-top: 5px;
            font-size: 10px;
            color: #9ca3af;
        }

        /* Untuk layar kecil */
        @media (max-width: 560px) {
            .profile-card {
                justify-content: center;
                padding: 10px 0;
            }

            .profile-info {
                display: none;
            }
        }

        /* AREA KONTEN */
        .main-content {
            margin-left: 220px;
            min-height: 100vh;
            padding: 27px 32px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 24px;
        }

        .page-header h1 {
            margin: 0 0 7px;
            font-size: 23px;
        }

        .page-header p {
            margin: 0;
            color: #6b7280;
            font-size: 13px;
        }

        /* TOMBOL */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 15px;
            border: none;
            border-radius: 7px;
            background: #111827;
            color: white;
            text-decoration: none;
            font-size: 13px;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn:hover {
            background: #1f2937;
        }

        .btn-edit {
            background: #f59e0b;
        }

        .btn-edit:hover {
            background: #d97706;
        }

        .btn-delete {
            background: #dc2626;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }

        .btn-detail {
            background: #374151;
        }

        .btn-detail:hover {
            background: #1f2937;
        }

        /* PANEL DAN TABEL */
        .panel {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
        }

        .panel-body {
            padding: 20px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .data-table th {
            padding: 14px;
            background: #f8fafc;
            color: #6b7280;
            text-align: left;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            white-space: nowrap;
        }

        .data-table td {
            padding: 14px;
            border-top: 1px solid #edf0f3;
            vertical-align: middle;
        }

        .data-table tbody tr:hover {
            background: #fafafa;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 6px;
        }

        .actions .btn {
            padding: 8px 10px;
            font-size: 12px;
        }

        .empty {
            text-align: center;
            padding: 28px !important;
            color: #6b7280;
        }

        /* PENCARIAN */
        .search-form {
            display: flex;
            gap: 8px;
            margin-bottom: 18px;
            align-items: center;
        }

        .search-form input {
            width: 350px;
            max-width: 100%;
            padding: 11px 13px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            outline: none;
            font-size: 13px;
        }

        .search-form input:focus {
            border-color: #6b7280;
        }

        .reset-link {
            color: #6b7280;
            font-size: 13px;
            text-decoration: none;
        }

        /* NOTIFIKASI */
        .success {
            padding: 12px 15px;
            margin-bottom: 18px;
            border-radius: 7px;
            background: #dcfce7;
            color: #166534;
            font-size: 13px;
        }

        .error-list {
            padding: 12px 16px;
            margin-bottom: 18px;
            border-radius: 7px;
            background: #fee2e2;
            color: #991b1b;
            font-size: 13px;
        }

        /* DASHBOARD */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .stat-card {
            padding: 24px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 11px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .stat-label {
            color: #6b7280;
            font-size: 13px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9px;
            background: #f3f4f6;
            font-size: 18px;
        }

        .stat-number {
            margin: 18px 0 7px;
            font-size: 34px;
            font-weight: bold;
        }

        .stat-description {
            margin: 0;
            color: #9ca3af;
            font-size: 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {
            .sidebar {
                width: 190px;
            }

            .main-content {
                margin-left: 190px;
                padding: 22px 18px;
            }

            .dashboard-cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 560px) {
            .sidebar {
                width: 70px;
                padding: 16px 8px;
            }

            .brand {
                justify-content: center;
                padding: 0 0 18px;
            }

            .brand-text,
            .menu-title,
            .nav-text,
            .sidebar-bottom .logout-text {
                display: none;
            }

            .nav-link {
                justify-content: center;
                padding: 12px 5px;
            }

            .main-content {
                margin-left: 70px;
                padding: 18px 12px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .search-form {
                flex-wrap: wrap;
            }

            .search-form input {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-logo">S</div>
            <div class="brand-text">
                <div class="brand-name">Sertifikasi</div>
                <div class="brand-subtitle">Pengelolaan Data</div>
            </div>
        </div>

        <!-- PROFIL AKUN -->
        <div class="profile-card">
            <div class="profile-avatar">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>

            <div class="profile-info">
                <div class="profile-name">
                    {{ Auth::user()->name ?? 'Admin' }}
                </div>

                <div class="profile-email">
                    {{ Auth::user()->email ?? 'admin@gmail.com' }}
                </div>

                <div class="profile-label">
                    Profil Akun
                </div>
            </div>
        </div>

        <p class="menu-title">MENU</p>

        <nav>
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M3 10.5L12 3l9 7.5"></path>
                        <path d="M5 9.5V21h14V9.5"></path>
                        <path d="M9 21v-6h6v6"></path>
                    </svg>
                </span>
                <span class="nav-text">Dashboard</span>
            </a>

            <a href="{{ route('peserta.index') }}"
               class="nav-link {{ request()->routeIs('peserta.*') ? 'active' : '' }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 21c0-4 3.5-6 8-6s8 2 8 6"></path>
                    </svg>
                </span>
                <span class="nav-text">Data Peserta</span>
            </a>

            <a href="{{ route('skema.index') }}"
               class="nav-link {{ request()->routeIs('skema.*') ? 'active' : '' }}">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                        <path d="M8 8h8"></path>
                        <path d="M8 12h8"></path>
                        <path d="M8 16h5"></path>
                    </svg>
                </span>
                <span class="nav-text">Data Skema</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <span>⇥</span>
                    <span class="logout-text">Keluar</span>
                </button>
            </form>
        </div>

    </aside>

    <main class="main-content">
        @yield('content')
    </main>

</body>
</html>
