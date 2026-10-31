<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'IT Asset Management')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* =========================
           GLOBAL
        ========================= */
        :root {
            --primary: #0d6efd;
            --primary-soft: #eaf2ff;
            --primary-hover: #0b5ed7;
            --danger: #dc3545;
            --danger-soft: #fff1f2;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --border: #e8ecf2;
            --background: #f5f7fb;
            --sidebar-width: 250px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--background);
            color: var(--text-dark);
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                "Helvetica Neue",
                Arial,
                sans-serif;
        }

        a {
            text-decoration: none;
        }

        /* =========================
           SIDEBAR
        ========================= */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #ffffff;
            border-right: 1px solid var(--border);
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s ease;
            padding: 18px !important;
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #d9dee7;
            border-radius: 10px;
        }

        /* =========================
           BRAND
        ========================= */
        .brand-wrapper {
            padding: 4px 2px 8px;
        }

        .brand {
            font-weight: 700;
            font-size: 19px;
            color: #111827;
            letter-spacing: -0.2px;
        }

        .brand-subtitle {
            font-size: 12px;
            color: #9ca3af;
            margin-top: 2px;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-soft);
            color: var(--primary);
            font-size: 20px;
            flex-shrink: 0;
        }

        /* =========================
           MENU LABEL
        ========================= */
        .menu-label {
            color: #9ca3af;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.8px;
            margin: 22px 4px 8px;
        }

        /* =========================
           MENU LINK
        ========================= */
        .menu-link {
            color: #667085;
            text-decoration: none;
            padding: 11px 13px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 5px;
            transition:
                background-color 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid transparent;
        }

        .menu-link i {
            font-size: 18px;
            width: 22px;
            min-width: 22px;
            text-align: center;
            transition: transform 0.2s ease;
        }

        .menu-link:hover {
            background-color: #f5f8ff;
            color: var(--primary);
            transform: translateX(2px);
        }

        .menu-link:hover i {
            transform: scale(1.05);
        }

        .menu-link.active {
            background-color: var(--primary-soft);
            color: var(--primary);
            font-weight: 600;
            border-color: #dce9ff;
        }

        .menu-link.active i {
            color: var(--primary);
        }

        /* =========================
           DIVIDER
        ========================= */
        .sidebar-divider {
            border: 0;
            border-top: 1px solid var(--border);
            margin: 18px 2px;
            opacity: 1;
        }

        /* =========================
           ACCOUNT SECTION
        ========================= */
        .account-section {
            margin-top: 2px;
        }

        /* =========================
           LOGOUT
        ========================= */
        .logout-form {
            margin: 4px 0 0;
        }

        .logout-button {
            color: var(--danger) !important;
            background: transparent;
            border: 1px solid transparent !important;
            cursor: pointer;
            width: 100%;
            text-align: left;
            font-family: inherit;
        }

        .logout-button:hover {
            background: var(--danger-soft) !important;
            color: var(--danger) !important;
            border-color: #ffd9dd !important;
            transform: translateX(2px);
        }

        .logout-button i {
            color: var(--danger);
        }

        /* =========================
           MAIN CONTENT
        ========================= */
        .main-content {
            min-height: 100vh;
            width: calc(100% - var(--sidebar-width));
            margin-left: var(--sidebar-width);
            transition: all 0.3s ease;
        }

        /* =========================
           PAGE CARD
        ========================= */
        .page-card {
            background: #ffffff;
            border: 1px solid rgba(232, 236, 242, 0.8);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.035);
        }

        /* =========================
           BUTTON
        ========================= */
        .btn {
            border-radius: 10px;
            font-weight: 500;
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background-color 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15);
        }

        .btn-primary:hover {
            box-shadow: 0 6px 16px rgba(13, 110, 253, 0.2);
        }

        /* =========================
           FORM
        ========================= */
        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px 14px;
            border-color: #dfe4ea;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.12);
        }

        .form-label {
            font-weight: 500;
            color: #374151;
        }

        /* =========================
           TABLE
        ========================= */
        .table {
            white-space: nowrap;
            vertical-align: middle;
        }

        .table thead th {
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            background: #f8fafc;
            border-bottom: 1px solid var(--border);
            padding-top: 13px;
            padding-bottom: 13px;
        }

        .table tbody td {
            padding-top: 13px;
            padding-bottom: 13px;
            border-color: #f0f2f5;
        }

        .table tbody tr {
            transition: background-color 0.15s ease;
        }

        .table tbody tr:hover {
            background-color: #fafcff;
        }

        /* =========================
           BADGE
        ========================= */
        .badge {
            border-radius: 8px;
            padding: 6px 9px;
            font-weight: 500;
        }

        /* =========================
           ALERT
        ========================= */
        .alert {
            border-radius: 12px;
            border-width: 1px;
        }

        /* =========================
           MOBILE HEADER
        ========================= */
        .mobile-header {
            display: none;
        }

        .sidebar-overlay {
            display: none;
        }

        /* =========================
           TABLET
        ========================= */
        @media (max-width: 991.98px) {
            :root {
                --sidebar-width: 220px;
            }

            .sidebar {
                width: var(--sidebar-width);
            }

            .main-content {
                width: calc(100% - var(--sidebar-width));
                margin-left: var(--sidebar-width);
            }
        }

        /* =========================
           MOBILE
        ========================= */
        @media (max-width: 767.98px) {

            .mobile-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                height: 60px;
                padding: 0 15px;
                background: #ffffff;
                border-bottom: 1px solid var(--border);
                position: sticky;
                top: 0;
                z-index: 900;
            }

            .mobile-header-title {
                font-weight: 700;
                font-size: 17px;
                color: #111827;
            }

            .mobile-menu-btn {
                width: 40px;
                height: 40px;
                border: 1px solid #dce7fa;
                border-radius: 10px;
                background: var(--primary-soft);
                color: var(--primary);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                transition: all 0.2s ease;
            }

            .mobile-menu-btn:hover {
                background: #dceaff;
                transform: translateY(-1px);
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: -280px;
                width: 250px;
                height: 100vh;
                min-height: 100vh;
                z-index: 1100;
                transition:
                    left 0.3s ease,
                    box-shadow 0.3s ease;
                box-shadow: none;
            }

            .sidebar.show {
                left: 0;
                box-shadow: 8px 0 30px rgba(0, 0, 0, 0.10);
            }

            .sidebar-overlay {
                position: fixed;
                inset: 0;
                background: rgba(15, 23, 42, 0.42);
                backdrop-filter: blur(2px);
                z-index: 1050;
            }

            .sidebar-overlay.show {
                display: block;
            }

            .main-content {
                width: 100%;
                margin-left: 0;
            }

            .main-content .container-fluid {
                padding: 18px 14px !important;
            }

            .menu-link {
                padding: 11px 13px;
            }
        }

        /* =========================
           SMALL MOBILE
        ========================= */
        @media (max-width: 575.98px) {

            .mobile-header {
                height: 56px;
            }

            .mobile-header-title {
                font-size: 16px;
            }

            .brand-icon {
                width: 38px;
                height: 38px;
            }

            .main-content .container-fluid {
                padding: 15px 12px !important;
            }

            .page-card {
                border-radius: 13px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         MOBILE HEADER
    ========================= -->
    <div class="mobile-header">

        <div class="d-flex align-items-center gap-2">

            <div class="brand-icon">
                <i class="bi bi-pc-display"></i>
            </div>

            <div class="mobile-header-title">
                IT Asset
            </div>

        </div>

        <button type="button"
                class="mobile-menu-btn"
                id="mobileMenuButton"
                aria-label="Buka menu">

            <i class="bi bi-list"></i>

        </button>

    </div>


    <div class="d-flex">

        <!-- =========================
             SIDEBAR OVERLAY
        ========================= -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>


        <!-- =========================
             SIDEBAR
        ========================= -->
        <aside class="sidebar">

            <!-- BRAND -->
            <div class="brand-wrapper">

                <div class="d-flex align-items-center gap-2">

                    <div class="brand-icon">
                        <i class="bi bi-pc-display"></i>
                    </div>

                    <div>
                        <div class="brand">
                            IT Asset
                        </div>

                        <div class="brand-subtitle">
                            Management System
                        </div>
                    </div>

                </div>

            </div>


            <!-- MENU UTAMA -->
            <div class="menu-label">
                MENU UTAMA
            </div>

            <nav>

                <!-- DASHBOARD -->
                <a href="{{ url('/dashboard') }}"
                   class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}">

                    <i class="bi bi-grid"></i>

                    <span>Dashboard</span>

                </a>


                <!-- DATA ASET -->
                <a href="{{ url('/aset') }}"
                   class="menu-link {{ request()->is('aset*') ? 'active' : '' }}">

                    <i class="bi bi-laptop"></i>

                    <span>Data Aset</span>

                </a>


                <!-- MAINTENANCE -->
                <a href="{{ url('/maintenance') }}"
                   class="menu-link {{ request()->is('maintenance*') ? 'active' : '' }}">

                    <i class="bi bi-tools"></i>

                    <span>Maintenance</span>

                </a>


                <!-- KATEGORI -->
                <a href="{{ url('/kategori-aset') }}"
                   class="menu-link {{ request()->is('kategori-aset*') ? 'active' : '' }}">

                    <i class="bi bi-folder"></i>

                    <span>Kategori Aset</span>

                </a>


                <!-- LAPORAN -->
                <a href="{{ route('laporan.index') }}"
                   class="menu-link {{ request()->is('laporan*') ? 'active' : '' }}">

                    <i class="bi bi-bar-chart"></i>

                    <span>Laporan</span>

                </a>

            </nav>


            <!-- DIVIDER -->
            <hr class="sidebar-divider">


            <!-- AKUN -->
            <div class="menu-label">
                AKUN
            </div>

            <div class="account-section">

                <!-- PROFILE -->
                <a href="{{ route('profile.index') }}"
                   class="menu-link {{ request()->is('profile*') ? 'active' : '' }}">

                    <i class="bi bi-person-circle"></i>

                    <span>Profile</span>

                </a>


                <!-- LOGOUT -->
                <form action="{{ url('/logout') }}"
                      method="POST"
                      class="logout-form">

                    @csrf

                    <button type="submit"
                            class="menu-link logout-button"
                            onclick="return confirm('Apakah Anda yakin ingin logout?')">

                        <i class="bi bi-box-arrow-right"></i>

                        <span>Logout</span>

                    </button>

                </form>

            </div>

        </aside>


        <!-- =========================
             MAIN CONTENT
        ========================= -->
        <main class="main-content flex-grow-1">

            <div class="container-fluid p-4">

                @yield('content')

            </div>

        </main>

    </div>


    <!-- =========================
         BOOTSTRAP JS
    ========================= -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- =========================
         ALERT AUTO CLOSE
    ========================= -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const alerts = document.querySelectorAll('.alert');

            alerts.forEach(function (alert) {

                setTimeout(function () {

                    if (alert && document.body.contains(alert)) {

                        const bsAlert =
                            bootstrap.Alert.getOrCreateInstance(alert);

                        bsAlert.close();

                    }

                }, 3000);

            });

        });
    </script>


    <!-- =========================
         MOBILE SIDEBAR
    ========================= -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const menuButton =
                document.getElementById('mobileMenuButton');

            const sidebar =
                document.querySelector('.sidebar');

            const overlay =
                document.getElementById('sidebarOverlay');


            function openSidebar() {

                sidebar.classList.add('show');

                overlay.classList.add('show');

                document.body.style.overflow = 'hidden';

            }


            function closeSidebar() {

                sidebar.classList.remove('show');

                overlay.classList.remove('show');

                document.body.style.overflow = '';

            }


            if (menuButton) {

                menuButton.addEventListener('click', function () {

                    openSidebar();

                });

            }


            if (overlay) {

                overlay.addEventListener('click', function () {

                    closeSidebar();

                });

            }


            /* Tutup sidebar setelah memilih menu di HP */
            sidebar.querySelectorAll('a.menu-link').forEach(function (link) {

                link.addEventListener('click', function () {

                    if (window.innerWidth <= 767) {

                        closeSidebar();

                    }

                });

            });


            /* Tutup sidebar ketika layar kembali ke desktop */
            window.addEventListener('resize', function () {

                if (window.innerWidth > 767) {

                    closeSidebar();

                }

            });

        });
    </script>

</body>

</html>