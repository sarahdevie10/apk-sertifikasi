<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Sertifikasi</title>

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

        /* ================= NAVBAR ================= */

        .navbar {
            height: 68px;
            background: #111827;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            background: white;
            color: #111827;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-name {
            font-size: 14px;
        }

        .logout {
            background: #ef4444;
            color: white;
            border: none;
            padding: 9px 15px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout:hover {
            background: #dc2626;
        }


        /* ================= LAYOUT ================= */

        .layout {
            display: flex;
            min-height: calc(100vh - 68px);
        }


        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 250px;
            background: white;
            padding: 30px 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
        }

        .menu-title {
            font-size: 13px;
            color: #94a3b8;
            font-weight: bold;
            margin: 0 15px 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #374151;
            padding: 12px 10px;
            margin-bottom: 8px;
            border-radius: 12px;
            font-size: 15px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #f3f4f6;
        }

        .sidebar a.active {
            background: #111827;
            color: white;
            box-shadow: 0 4px 10px rgba(17, 24, 39, 0.15);
        }


        /* ================= ICON ================= */

        .menu-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .menu-icon svg {
            width: 22px;
            height: 22px;
        }

        .icon-dashboard {
            background: #3b82f6;
        }

        .icon-peserta {
            background: #ede9fe;
        }

        .icon-skema {
            background: #ffedd5;
        }

        .icon-peserta svg {
            stroke: #6d28d9;
        }

        .icon-skema svg {
            stroke: #ea580c;
        }


        /* ================= ARROW ================= */

        .menu-arrow {
            margin-left: auto;
            font-size: 20px;
            color: #94a3b8;
        }

        .sidebar a.active .menu-arrow {
            color: white;
        }


        /* ================= CONTENT ================= */

        .content {
            flex: 1;
            padding: 35px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .welcome p {
            margin: 0;
            color: #6b7280;
        }


        /* ================= CARDS ================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
            border: 1px solid #eef0f3;
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card h3 {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
            font-weight: normal;
        }

        .card-icon {
            width: 42px;
            height: 42px;
            border-radius: 9px;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .number {
            font-size: 36px;
            font-weight: bold;
            margin: 18px 0 0;
            color: #111827;
        }

        .card-text {
            margin: 7px 0 0;
            color: #9ca3af;
            font-size: 13px;
        }


        /* ================= RESPONSIVE ================= */

        @media (max-width: 700px) {

            .navbar {
                padding: 0 15px;
            }

            .admin-name {
                display: none;
            }

            .sidebar {
                width: 190px;
            }

            .content {
                padding: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->

    <div class="navbar">

        <div class="logo">

            <div class="logo-icon">
                S
            </div>

            Sertifikasi

        </div>


        <div class="admin">

            <span class="admin-name">
                {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="logout" type="submit">
                    Logout
                </button>

            </form>

        </div>

    </div>


    <!-- LAYOUT -->

    <div class="layout">


        <!-- SIDEBAR -->

        <div class="sidebar">

            <p class="menu-title">
                MENU
            </p>


            <!-- DASHBOARD -->

            <a href="{{ route('dashboard') }}" class="active">

                <span class="menu-icon icon-dashboard">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="white"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M3 10.5L12 3l9 7.5"></path>
                        <path d="M5 9.5V21h14V9.5"></path>
                        <path d="M9 21v-6h6v6"></path>
                    </svg>

                </span>

                <span>
                    Dashboard
                </span>

                <span class="menu-arrow">
                    ›
                </span>

            </a>


            <!-- DATA PESERTA -->

            <a href="{{ route('peserta.index') }}">

                <span class="menu-icon icon-peserta">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 21c0-4 3.5-6 8-6s8 2 8 6"></path>
                    </svg>

                </span>

                <span>
                    Data Peserta
                </span>

                <span class="menu-arrow">
                    ›
                </span>

            </a>


            <!-- DATA SKEMA -->

            <a href="{{ route('skema.index') }}">

                <span class="menu-icon icon-skema">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                        <path d="M8 8h8"></path>
                        <path d="M8 12h8"></path>
                        <path d="M8 16h5"></path>
                    </svg>

                </span>

                <span>
                    Data Skema
                </span>

                <span class="menu-arrow">
                    ›
                </span>

            </a>

        </div>


        <!-- CONTENT -->

        <div class="content">

            <div class="welcome">

                <h1>
                    Dashboard
                </h1>

                <p>
                    Selamat datang kembali,
                    <strong>{{ Auth::user()->name }}</strong>!
                </p>

            </div>


            <!-- CARDS -->

            <div class="cards">

                <div class="card">

                    <div class="card-top">

                        <h3>
                            Total Peserta
                        </h3>

                        <div class="card-icon">
                            👤
                        </div>

                    </div>

                    <p class="number">
                        {{ $jumlahPeserta }}
                    </p>

                    <p class="card-text">
                        Peserta yang terdaftar
                    </p>

                </div>


                <div class="card">

                    <div class="card-top">

                        <h3>
                            Total Skema
                        </h3>

                        <div class="card-icon">
                            📋
                        </div>

                    </div>

                    <p class="number">
                        {{ $jumlahSkema }}
                    </p>

                    <p class="card-text">
                        Skema sertifikasi tersedia
                    </p>

                </div>

            </div>

        </div>

    </div>

</body>
</html>